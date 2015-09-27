<?php

namespace Whole\Core\Http\Middleware;

use Closure;
use Laracasts\Flash\Flash;
use Illuminate\Contracts\Auth\Guard;
use Whole\Core\Repositories\PermittedPage\PermittedPageRepository;
use Whole\Core\Repositories\User\UserRepository;
class PermittedPage
{

    protected $permitted_page;
    protected $auth;
    protected $user;

    public function __construct(PermittedPageRepository $permitted_page, Guard $auth, UserRepository $user)
    {
        $this->permitted_page = $permitted_page;
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
        $roleId = $this->user->getRoleId($this->auth->user()->id);
        $permitted_pages = $this->permitted_page->permittedPages($roleId);
        $is_page = false;
        foreach($permitted_pages as $k=>$page)
        {
            if(is_numeric($k))
            {
                if($request->is($page))
                {
                    $is_page = true;
                }
            }

        }


        if (!$is_page)
        {
            if($permitted_pages['access'])
            {
                return view('backend::_layouts.not_allowed');
            }else
            {
                if($permitted_pages['process'])
                {
                    if ($request->method()!="GET")
                    {
                        Flash::warning(trans('whole::http.middleware.permitted_page_warning'));
                        return redirect()->back();
                    }
                }
            }

        }
        return $next($request);
    }
}
