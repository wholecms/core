<?php

namespace Whole\Core\Http\Middleware;

use Closure;
use Whole\Core\Models\User;
use Illuminate\Contracts\Auth\Guard;

class IsLogin
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
        if ( $this->auth->check() && ($this->user->find($this->auth->user()->id)->hasRole(1)))
        {
            return redirect()->route('admin.index');
        }
        return $next($request);
    }
}