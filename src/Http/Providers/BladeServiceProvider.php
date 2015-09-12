<?php

namespace Whole\Core\Http\Providers;

use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \Blade::extend(function($view)
        {
            return preg_replace('/\@set\((.+)\,(.+)\)/', '<?php ${1} = ${2}; ?>', $view);
        });
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
