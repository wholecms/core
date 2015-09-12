<?php

namespace Whole\Core\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Whole\Core\Repositories\User\UserRepository;
use Whole\Core\Repositories\Role\RoleRepository;
use Whole\Core\Http\Requests\UserRequest;
use App\Http\Controllers\Auth\AuthController;
use Laracasts\Flash\Flash;
use Whole\Core\Logs\Facade\Logs;

class UsersController extends Controller
{
    protected $user;
    protected $role;

    /**
     * @param UserRepository $user
     * @param RoleRepository $role
     */
    public function __construct(UserRepository $user, RoleRepository $role)
    {
        $this->user = $user;
        $this->role = $role;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->user->all();
        return view('backend::users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = $this->role->all()->lists('role_name','id');
        return view('backend::users.create',compact('roles'));
    }


    public function store(UserRequest $request)
    {
        if ($user = $this->user->create($request->all()))
        {
            Logs::add('process',"Kullanıcı Eklendi.\nID:{$user->id}");
            Flash::success('Başarıyla Kaydedildi');
            return redirect()->route('admin.user.index');
        }else
        {
            Logs::add('process',"Kullanıcı Eklenemdi!");
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
        $user = $this->user->find($id);
        $roles = $this->role->all()->lists('role_name','id');
        return view('backend::users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
        if ($this->user->update($request->all(),$id))
        {
            Logs::add('process',"Kullanıcı Düzenlendi.\nID:{$id}");
            Flash::success('Başarıyla Düzenlendi');
            return redirect()->route('admin.user.index');
        }else
        {
            Logs::add('errors',"Kullanıcı Düzenlenemedi.\nID:{$id}");
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
        $message = $this->user->delete($id) ?
            ['success','Başarıyla Silindi'] :
            ['error','Bir Hata Meydana Geldi ve Silinemedi'];
        Flash::$message[0]($message[1]);
        if ($message[0]=="success")
        {
            Logs::add('process',"Kullanıcı Silindi\nID:{$id}");
        }else
        {
            Logs::add('errors',"Kullanıcı Silinemedi!\nID:{$id}");
        }
        return redirect()->route('admin.user.index');
    }
}
