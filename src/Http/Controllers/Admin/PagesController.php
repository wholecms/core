<?php

namespace Whole\Core\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Whole\Core\Repositories\Role\RoleRepository;
use Whole\Core\Repositories\Page\PageRepository;
use Whole\Core\Repositories\ContentPage\ContentPageRepository;
use Whole\Core\Repositories\Content\ContentRepository;
use Whole\Core\Repositories\Component\ComponentRepository;
use Whole\Core\Http\Requests\PageRequest;
use Illuminate\Support\Facades\Cache;
use Whole\Core\Logs\Facade\Logs;

class PagesController extends Controller
{
    protected $page;
    protected $role;
    protected $content_page;
    protected $content;
    protected $component;

    /**
     * @param PageRepository $page
     * @param RoleRepository $role
     */
    public function __construct(PageRepository $page, RoleRepository $role, ContentPageRepository $content_page, ContentRepository $content, ComponentRepository $component)
    {
        $this->page = $page;
        $this->role = $role;
        $this->content_page = $content_page;
        $this->content = $content;
        $this->component = $component;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $pages = $this->page->all();
        return view('backend::pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $components = $this->component->allComponentAndFilesLists('file','id');
        $contents = $this->content->all()->lists('title','id');
        $roles = $this->role->all()->lists('role_name','id');
        $content_pages = $this->content_page->all()->lists('name','id');
        return view('backend::pages.create',compact('roles','content_pages','contents','components'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PageRequest $request
     * @return Response
     */
    public function store(PageRequest $request)
    {
        Cache::forget('_pages');
        $data = $request->all();

        switch ($request->get('content_type')) {
            case "content":
                unset($data['component_id'],$data['external_link']);
                break;
            case "component":
                unset($data['content_id'],$data['external_link']);
                break;
            case "link":
                unset($data['content_id'],$data['component_id']);
                break;
        }

        if ($request->get('content_type')=="content" && $request->get('content_id')=="")
        {
            if ($content = $this->content->newContent([
                'title'=>$request->get('create_content_title'),
                'title_visibility'=>$request->get('create_content_title_visibility'),
                'status'=>$request->get('create_content_status'),
                'access'=>serialize($request->get('create_content_access')),
                'content'=>$request->get('create_content_content'),
            ])){
                $data['content_id'] = $content->id;
            }
            else
            {
                Flash::error('İçerik Eklenemedi ve İşlem İptal Edildi Önce Yeni İçerik Ekleyerek Sayfayı Oluşturmayı Deneyebilirsiniz');
                return redirect()->route('admin.page.index');
            }
        }
        $data['access'] = serialize($data['access']);
        if ($page = $this->page->saveData("create",$data))
        {
            Logs::add('process',"Sayfa Oluşturuldu\nID:{$page->id}");
            Flash::success('Başarıyla Kaydedildi');
            return redirect()->route('admin.page.index');
        }
        else
        {
            Logs::add('errors',"Sayfa Oluşturulamadı");
            Flash::error('Bir Hata Meydana Geldi ve Kaydedilemedi');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $page = $this->page->find($id);
        $components = $this->component->allComponentAndFilesLists('file','id');
        $contents = $this->content->all()->lists('title','id');
        $roles = $this->role->all()->lists('role_name','id');
        $content_pages = $this->content_page->all()->lists('name','id');
        return view('backend::pages.edit',compact('page','roles','content_pages','contents','components'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PageRequest $request
     * @param  int $id
     * @return Response
     */
    public function update(PageRequest $request, $id)
    {
        Cache::forget('_pages');
        $data = $request->all();

        switch ($request->get('content_type')) {
            case "content":
                $data['component_id'] = $data['external_link'] = null;
                break;
            case "component":
                $data['content_id'] = $data['external_link'] = null;
                break;
            case "link":
                $data['content_id'] = $data['component_id'] = null;
                break;
        }

        if ($request->get('content_type')=="content" && $request->get('content_id')=="")
        {
            if ($content = $this->content->newContent([
                'title'=>$request->get('create_content_title'),
                'title_visibility'=>$request->get('create_content_title_visibility'),
                'status'=>$request->get('create_content_status'),
                'access'=>serialize($request->get('create_content_access')),
                'content'=>$request->get('create_content_content'),
            ])){
                $data['content_id'] = $content->id;
            }
            else
            {
                Flash::error('İçerik Eklenemedi ve İşlem İptal Edildi Önce Yeni İçerik Ekleyerek Sayfayı Oluşturmayı Deneyebilirsiniz');
                return redirect()->route('admin.page.index');
            }
        }
        $data['access'] = serialize($data['access']);
        if ($this->page->saveData("update",$data,$id))
        {
            Logs::add('process',"Sayfa Güncellendi\nID:{$id}");
            Flash::success('Başarıyla Kaydedildi');
            return redirect()->route('admin.page.index');
        }
        else
        {
            Logs::add('errors',"Sayfa Güncellenemedi! \nID:{$id}");
            Flash::error('Bir Hata Meydana Geldi ve Kaydedilemedi');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Cache::forget('_pages');
        $message = $this->page->delete($id) ?
            ['success','Başarıyla Silindi'] :
            ['error','Bir Hata Meydana Geldi ve Silinemedi'];
        Flash::$message[0]($message[1]);
        if ($message[0]=="success")
        {
            Logs::add('process',"Sayfa Silindi\nID:{$id}");
        }else
        {
            Logs::add('errors',"Sayfa Silinemedi\nID:{$id}");
        }
        return redirect()->route('admin.page.index');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function ajaxUpdate(Request $request)
    {
        Cache::forget('_pages');
        return $this->page->find($request->get('id'))
            ->update([$request->get('type')=>$request->get('status')]) ?
            "true" :
            "false";
    }
}
