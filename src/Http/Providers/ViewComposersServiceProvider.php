<?php

namespace Whole\Core\Http\Providers;

use Illuminate\Support\ServiceProvider;


class ViewComposersServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*','Whole\Core\Composers\MasterPageViewComposer@compose');
        view()->composer('backend::_layouts._menu','Whole\Core\Composers\SidebarMenuViewComposer@compose');
        view()->composer('backend::_layouts._header','Whole\Core\Composers\UserMenuViewComposer@compose');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
