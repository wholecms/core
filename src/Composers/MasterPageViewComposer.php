<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 23.8.2015
 * Time: 02:36
 */

namespace Whole\Core\Composers;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Auth\Guard;
use Whole\Core\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Cache;

class MasterPageViewComposer
{
    protected $auth;
    protected $user;

    public function __construct(Guard $auth, UserRepository $user)
    {
        $this->auth = $auth;
        $this->user = $user;
    }

    public function compose(View $view)
    {
        if (!Cache::has('role_id'))
        {
            Cache::rememberForever('role_id', function()
            {
                return $this->auth->user()!==null?$this->user->getRoleId($this->auth->user()->id):0;
            });
        }


        $view->with('user_role_id',Cache::get('role_id'));
    }

    public function getRoleId()
    {
        if (!Cache::has('role_id'))
        {
            Cache::rememberForever('role_id', function()
            {
                return $this->auth->user()!==null?$this->user->getRoleId($this->auth->user()->id):0;
            });
        }
        Cache::get('role_id');
    }
}