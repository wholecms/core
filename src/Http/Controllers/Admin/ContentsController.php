<?php

namespace Whole\Core\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Whole\Core\Repositories\Content\ContentRepository;
use Whole\Core\Repositories\Role\RoleRepository;
use Whole\Core\Http\Requests\ContentRequest;
use Illuminate\Support\Facades\Cache;
use Whole\Core\Logs\Facade\Logs;
class ContentsController extends Controller
{
    protected $content;
    protected $role;

    /**
     * @param ContentRepository $content
     * @param RoleRepository $role
     */
    public function __construct(ContentRepository $content, RoleRepository $role)
    {
        $this->content = $content;
        $this->role = $role;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $contents = $this->content->all();
        return view('backend::contents.index',compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = $this->role->all()->lists('role_name','id');
        return view('backend::contents.create',compact('roles'));
    }


    /**
     * @param ContentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ContentRequest $request)
    {
        Cache::forget('_contents');
        $data = $request->all();
        $data['access'] = serialize($request->get('access'));
        if ($content = $this->content->saveData('create',$data))
        {
            Logs::add('process',trans("whole::http.controllers.contents_log_1",['id'=>$content->id]));
            Flash::success(trans("whole::http.controllers.contents_flash_1"));
            return redirect()->route('admin.content.index');
        }
        else
        {
            Logs::add('errors',trans("whole::http.controllers.contents_log_2"));
            Flash::error(trans("whole::http.controllers.contents_flash_2"));
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
        $content = $this->content->find($id);
        $roles = $this->role->all()->lists('role_name','id');
        return view('backend::contents.edit',compact('content','roles'));
    }


    /**
     * @param ContentRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ContentRequest $request, $id)
    {
        Cache::forget('_contents');
        $data = $request->all();
        $data['access'] = serialize($request->get('access'));
        if ($this->content->saveData('update',$data,$id))
        {
            Logs::add('process',trans("whole::http.controllers.contents_log_3",['id'=>$id]));
            Flash::success(trans("whole::http.controllers.contents_flash_3"));
            return redirect()->route('admin.content.index');
        }
        else
        {
            Logs::add('errors',trans("whole::http.controllers.contents_log_4",['id'=>$id]));
            Flash::error(trans("whole::http.controllers.contents_flash_4"));
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
        Cache::forget('_contents');
        $message = $this->content->delete($id) ?
            ['success',trans("whole::http.controllers.contents_flash_5")] :
            ['error',trans("whole::http.controllers.contents_flash_6")];
        Flash::$message[0]($message[1]);
        if ($message[0]=="success")
        {
            Logs::add('process',trans("whole::http.controllers.contents_log_5",['id'=>$id]));
        }else
        {
            Logs::add('errors',trans("whole::http.controllers.contents_log_6",['id'=>$id]));
        }
        return redirect()->route('admin.content.index');

    }

    /**
     * @param Request $request
     * @return string
     */
    public function ajaxUpdate(Request $request)
    {
        Cache::forget('_contents');
        return $this->content->find($request->get('id'))
            ->update([$request->get('type')=>$request->get('status')]) ?
            "true" :
            "false";
    }
}
