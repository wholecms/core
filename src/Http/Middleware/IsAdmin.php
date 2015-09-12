<?php

namespace Whole\Core\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Guard;
use Laracasts\Flash\Flash;
use Whole\Core\Models\User;
use Closure;

class IsAdmin
{

    protected $auth;
    protected $user;

    /**
     * @param Guard $auth
     * @param User $user
     */
    public function __construct(Guard $auth, User $user)
    {
        $this->auth = $auth;
        $this->user = $user;

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( !$this->auth->check())
        {
//            Flash::error('Sayfaya Erişmek İçin Yetkiniz Yok');
            return redirect()->route('admin.login');
        }else{
            if (!$this->user->find($this->auth->user()->id)->hasRole(1)){
                Flash::error('Sayfaya Erişmek İçin Yetkiniz Yok');
                return redirect()->route('admin.login');
            }
        }
        return $next($request);
    }
}
