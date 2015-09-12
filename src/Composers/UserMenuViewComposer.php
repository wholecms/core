<?php
/**
 * Created by PhpStorm.
 * User: Furkan
 * Date: 2.9.2015
 * Time: 17:40
 */

namespace Whole\Core\Composers;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\Auth\Guard;
use Whole\Core\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Cache;

class UserMenuViewComposer
{
    protected $user;
    protected $auth;

    /**
     * @param UserRepository $user
     * @param Guard $auth
     */
    public function __construct(UserRepository $user, Guard $auth)
    {
        $this->user = $user;
        $this->auth = $auth;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        if (!Cache::has('this_user'))
        {
            Cache::rememberForever('this_user', function()
            {
                return $this->user->thisUser($this->auth->user()->id);
            });
        }
        $view->with('user',Cache::get('this_user'));
    }

}