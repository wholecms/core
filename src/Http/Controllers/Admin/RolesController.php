<?php

namespace Whole\Core\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Whole\Core\Http\Requests\RoleRequest;
use Whole\Core\Repositories\Role\RoleRepository;
use Whole\Core\Logs\Facade\Logs;


class RolesController extends Controller
{
    protected $role;

    /**
     * @param RoleRepository $role
     */
    public function __construct(RoleRepository $role)
    {
        $this->role = $role;
    }


    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $roles = $this->role->all();
        return view('backend::roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend::roles.create');
    }

    /**
     * @param RoleRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleRequest $request)
    {
        if ($role = $this->role->saveData("create",$request->all()))
        {
            Logs::add('process',"Kullanıcı Grubu Eklendi.\nID:{$role->id}");
            Flash::success('Başarıyla Kaydedildi');
            return redirect()->route('admin.role.index');
        }
        else
        {
            Logs::add('errors',"Kullanıcı Grubu Eklenemdi!");
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
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $role = $this->role->find($id);
        return view('backend::roles.edit',compact('role'));
    }


    /**
     * @param RoleRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleRequest $request, $id)
    {
        if ($this->role->saveData("update",$request->all(),$id))
        {
            Logs::add('process',"Kullanıcı Grubu Düzenlendi.\nID:{$id}");
            Flash::success('Başarıyla Düzenlendi');
            return redirect()->route('admin.role.index');
        }
        else
        {
            Logs::add('errors',"Kullanıcı Grubu Düzenlenemdi!.\nID:{$id}");
            Flash::error('Bir Hata Meydana Geldi ve Düzenlenemedi');
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
        $message = $this->role->destroy($id) ?
            ['success','Başarıyla Silindi'] :
            ['error','Bir Hata Meydana Geldi ve Silinemedi'];
        Flash::$message[0]($message[1]);
        if ($message[0]=="success")
        {
            Logs::add('process',"Kullanıcı Grubu Silindi\nID:{$id}");
        }else
        {
            Logs::add('errors',"Kullanıcı Grubu Silinemedi! \nID:{$id}");
        }
        return redirect()->route('admin.role.index');

    }
}
