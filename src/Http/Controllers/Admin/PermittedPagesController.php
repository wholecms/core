<?php

namespace Whole\Core\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Whole\Core\Repositories\PermittedPage\PermittedPageRepository;
use Whole\Core\Repositories\PermittedPage\AllPageRepository;
use Whole\Core\Repositories\Role\RoleRepository;
use Whole\Core\Logs\Facade\Logs;

class PermittedPagesController extends Controller
{
    protected $permitted_page;
    protected $all_page;
    protected $role;

    public function __construct(PermittedPageRepository $permitted_page, AllPageRepository $all_page, RoleRepository $role)
    {
        $this->permitted_page = $permitted_page;
        $this->all_page = $all_page;
        $this->role = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $all_pages = $this->all_page->all()->lists('path','path');
        $roles = $this->role->all();
        $permitted_page = $this->permitted_page->all();

        foreach($permitted_page as $page)
        {
            $permit[$page->role_id][] = $page->path;
        }

        return view('backend::permitted_pages.edit',compact('all_pages','roles','permitted_page','permit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $save = $this->permitted_page->save($request->all());
        if ($save===true)
        {
            Flash::success(trans('whole::http.controllers.permitted_pages_flash_1'));
            Logs::add('process',trans('whole::http.controllers.permitted_pages_log_1'));
            return redirect()->route('admin.permitted_page.index');
        }else
        {
            Flash::error($save[1]);
            Logs::add('process',trans('whole::http.controllers.permitted_pages_log_2').$save[1]);
            return redirect()->route('admin.permitted_page.index');
        }
    }


}