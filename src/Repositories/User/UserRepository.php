<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 6.8.2015
 * Time: 23:04
 */

namespace Whole\Core\Repositories\User;
use Whole\Core\Repositories\Repository;
use Whole\Core\Models\User;


class UserRepository extends Repository
{


    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }


    public function getRoleId($user_id)
    {
        return $this->model->find($user_id)->roles()->first()->id;
    }

    public function thisUser($id)
    {
        return $this->model->find($id);
    }

    public function lastUsers($limit)
    {
        return $this->model->latest('id')->limit($limit)->with('roles')->get();
    }


    public function all()
    {
        return $this->model->with('roles')->get();
    }


    public function create(array $data)
    {
        try
        {
            $data['password'] = bcrypt($data['password']);
            $user =  $this->model->create($this->except($data));
            $role = isset($data['role']) ? [$data['role']] : [];
            $user->roles()->attach($role);
        }catch (\Exception $e)
        {
            return false;
        }
        return $user;
    }

    public function update(array $data,$id)
    {
        $is_user = $this->model->find($id);
        $role = isset($data['role']) ? [$data['role']] : [];
        if ($data['password']=="")
        {
            unset($data['password'],$data['password_confirmation']);
        }else{
            unset($data['password_confirmation']);
            $data['password'] = bcrypt($data['password']);
        }
        try
        {
            $user = $is_user->update($data) ;
            $is_user->roles()->sync($role);
        }catch (\Exception $e)
        {
            return false;
        }
        return $user;
    }

}