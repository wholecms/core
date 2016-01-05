<?php

namespace Whole\Core\Http\Controllers\Admin;

use Whole\Core\Http\Controllers\Admin\MainController;
use Illuminate\Http\Request;
use App\Http\Requests;
use Whole\Core\Repositories\User\UserRepository;
use Whole\Core\Repositories\Role\RoleRepository;
use Whole\Core\Http\Requests\UserRequest;
use Laracasts\Flash\Flash;
use Whole\Core\Logs\Facade\Logs;

class UsersController extends MainController
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
            Logs::add('process',trans("whole::http/controllers.users_log_1",['id'=>$user->id]));
            Flash::success(trans("whole::http/controllers.users_flash_1"));
            return redirect()->route('admin.user.index');
        }else
        {
            Logs::add('process',trans("whole::http/controllers.users_log_2"));
            Flash::error(trans("whole::http/controllers.users_flash_2"));
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
     * @param UserRequest $request
     * @param  int $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
        if ($this->user->update($request->all(),$id))
        {
            Logs::add('process',trans("whole::http/controllers.users_log_3",['id'=>$id]));
            Flash::success(trans("whole::http/controllers.users_flash_3"));
            return redirect()->route('admin.user.index');
        }else
        {
            Logs::add('errors',trans("whole::http/controllers.users_log_4",['id'=>$id]));
            Flash::error(trans("whole::http/controllers.users_flash_4"));
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
            ['success',trans("whole::http/controllers.users_flash_5")] :
            ['error',trans("whole::http/controllers.users_flash_6")];
        Flash::$message[0]($message[1]);
        if ($message[0]=="success")
        {
            Logs::add('process',trans("whole::http/controllers.users_log_5",['id'=>$id]));
        }else
        {
            Logs::add('errors',trans("whole::http/controllers.users_log_6",['id'=>$id]));
        }
        return redirect()->route('admin.user.index');
    }
}
