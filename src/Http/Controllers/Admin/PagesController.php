<?php

namespace Whole\Core\Http\Controllers\Admin;

use Whole\Core\Http\Controllers\Admin\MainController;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;

use App\Http\Requests;
use Whole\Core\Repositories\Role\RoleRepository;
use Whole\Core\Repositories\Page\PageRepository;
use Whole\Core\Repositories\ContentPage\ContentPageRepository;
use Whole\Core\Repositories\Content\ContentRepository;
use Whole\Core\Repositories\Component\ComponentRepository;
use Whole\Core\Repositories\Component\ComponentFileRepository;
use Whole\Core\Http\Requests\PageRequest;
use Whole\Core\Logs\Facade\Logs;

class PagesController extends MainController
{
    protected $page;
    protected $role;
    protected $content_page;
    protected $content;
    protected $component;
    protected $component_file;

    /**
     * @param PageRepository $page
     * @param RoleRepository $role
     */
    public function __construct(PageRepository $page, RoleRepository $role, ContentPageRepository $content_page, ContentRepository $content, ComponentRepository $component,ComponentFileRepository $component_file)
    {
        $this->page = $page;
        $this->role = $role;
        $this->content_page = $content_page;
        $this->content = $content;
        $this->component = $component;
   	$this->component_file = $component_file;
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
        $this->itemsClearCache();
        $data = $request->all();
	$data['route'] = json_encode($request->get('route'));

        switch ($request->get('content_type')) {
            case "content":
                unset($data['component_id'],$data['external_link'],$data['route']);
                break;
            case "component":
                unset($data['content_id'],$data['external_link']);
                break;
            case "link":
                unset($data['content_id'],$data['component_id'],$data['route']);
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
                Flash::error(trans("whole::http/controllers.pages_flash_1"));
                return redirect()->route('admin.page.index');
            }
        }
        $data['access'] = serialize($data['access']);
        if ($page = $this->page->saveData("create",$data))
        {
            Logs::add('process',trans("whole::http/controllers.pages_log_1",['id'=>$page->id]));
            Flash::success(trans("whole::http/controllers.pages_flash_2"));
            return redirect()->route('admin.page.index');
        }
        else
        {
            Logs::add('errors',trans("whole::http/controllers.pages_log_2"));
            Flash::error(trans("whole::http/controllers.pages_flash_3"));
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
	if($page->route!=""){
	  $route_aar = (array) json_decode($page->route);
	  $route = [];
	  foreach($route_aar as $k=>$v){
	    $route[] = $k;
	  }

	  foreach($route as $k=>$v){
		if ($k>0){ 
			$params[$v] = route_input_render($v,$route_aar[$route[0]],$route_aar[$v]);
			/*$params[$v] = "".($v=="content_page"?"<input type=\"hidden\" name=\"route[name]\" value=\"".$route_aar[$route[0]]."\" />":"")."<input ".($v=="content_page"?"readonly":"")." class=\"form-control\" style=\"width:100px;display:inline;\" type=\"text\" name=\"route[{$v}]\" value=\"".($v=="content_page"?"this.id":$route_aar[$v])."\"/>";*/
			}
	  }
	   $page->route = urldecode(route($route_aar[$route[0]],$params));

	}
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
        $this->itemsClearCache();
        $data = $request->all();
	$data['route'] = json_encode($request->get('route'));

        switch ($request->get('content_type')) {
            case "content":
                $data['component_id'] = $data['external_link'] = $data['route'] = null;
                break;
            case "component":
                $data['content_id'] = $data['external_link'] = null;
                break;
            case "link":
                $data['content_id'] = $data['component_id'] = $data['route'] = null;
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
                Flash::error(trans("whole::http/controllers.pages_flash_4"));
                return redirect()->route('admin.page.index');
            }
        }
        $data['access'] = serialize($data['access']);
        if ($this->page->saveData("update",$data,$id))
        {
            Logs::add('process',trans("whole::http/controllers.pages_log_3",['id'=>$id]));
            Flash::success(trans("whole::http/controllers.pages_flash_5"));
            return redirect()->route('admin.page.index');
        }
        else
        {
            Logs::add('errors',trans("whole::http/controllers.pages_log_4",['id'=>$id]));
            Flash::error(trans("whole::http/controllers.pages_flash_3"));
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
        $this->itemsClearCache();
        $message = $this->page->delete($id) ?
            ['success',trans("whole::http/controllers.pages_flash_6")] :
            ['error',trans("whole::http/controllers.pages_flash_7")];
        Flash::$message[0]($message[1]);
        if ($message[0]=="success")
        {
            Logs::add('process',trans("whole::http/controllers.pages_log_5",['id'=>$id]));
        }else
        {
            Logs::add('errors',trans("whole::http/controllers.pages_log_6",['id'=>$id]));
        }
        return redirect()->route('admin.page.index');
    }

    /**
     * @param Request $request
     * @return string
     */
    public function ajaxUpdate(Request $request)
    {
        $this->itemsClearCache();
        return $this->page->find($request->get('id'))
            ->update([$request->get('type')=>$request->get('status')]) ?
            "true" :
            "false";
    }

     /**
     * @param Request $request
     * @return array
     */
    public function ajaxSelectComponentPage(Request $request)
    {
	if(($route = $this->component_file->find($request->get('id'))->route)!="")
	{
	   $route_aar = explode(",",$route);
		foreach($route_aar as $k=>$v){
			if ($k>0){
				$params[$v] = route_input_render($v,$route_aar[0]);
/*"".($v=="content_page"?"<input type=\"hidden\" name=\"route[name]\" value=\"".$route_aar[0]."\" />":"")."<input ".($v=="content_page"?"readonly":"")." class=\"form-control\" style=\"width:100px;display:inline;\" type=\"text\" name=\"route[{$v}]\" value=\"".($v=="content_page"?"this.id":$v)."\"/>";*/
 				}
                  }
	   return route($route_aar[0],$params);
	}
	
	return false;
	
    }
}
