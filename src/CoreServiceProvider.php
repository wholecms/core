<?php
namespace Whole\Core;
use Illuminate\Support\ServiceProvider;
use Whole\Core\Http\Providers\ViewComposersServiceProvider;
class CoreServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    protected $commands = [
        'Whole\Core\Commands\InstallCommand',
        'Whole\Core\Commands\AnalyticsCommand',
        'Whole\Core\Commands\CreateAdminCommand',
    ];


    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
		$nameSpace = $this->app->getNamespace();
        
		$this->app->router->group(['namespace' => $nameSpace . 'Http\Controllers'], function()
        {
            require __DIR__.'/Http/routes.php';
        });

        $this->publishes([
               __DIR__.'/../config/laravel-analytics.php' => config_path('laravel-analytics.php'),
           ]);

        $this->loadViewsFrom(__DIR__.'/../views', 'backend');
		$this->loadViewsFrom(__DIR__.'/../views', 'index');
        
		$this->publishes([
            __DIR__.'/../views' => base_path('resources/views/vendor'),
        ]);
		
		$this->loadTranslationsFrom(__DIR__.'/../translations/whole', 'whole');
		
		$this->publishes([
			__DIR__.'/../translations/whole' => base_path('resources/lang/vendor/whole'),
		]);

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../database/seeds/' => database_path('seeds')
        ], 'seeds');

		 $this->publishes([
            __DIR__.'/../public' => public_path(),
        ], 'public');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
        $this->app->register('Whole\Core\Http\Providers\BladeServiceProvider');
        $this->app->register('Whole\Core\Http\Providers\ViewComposersServiceProvider');
        $this->app->register('Whole\Core\Http\Providers\LogsServiceProvider');
        $this->app->register('Illuminate\Html\HtmlServiceProvider');
        $this->app->register('Laracasts\Flash\FlashServiceProvider');
        $this->app->register('Chumper\Zipper\ZipperServiceProvider');
        $this->app->register('Spatie\LaravelAnalytics\LaravelAnalyticsServiceProvider');

        $this->app->booting(function()
        {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('Html', 'Illuminate\Html\HtmlFacade');
            $loader->alias('Form', 'Illuminate\Html\FormFacade');
            $loader->alias('Flash', 'Laracasts\Flash\Flash');
            $loader->alias('Zipper', 'Chumper\Zipper\Facades\Zipper');
            $loader->alias('Logs', 'Whole\Core\Logs\Facade\Logs');
            $loader->alias('LaravelAnalytics', 'Spatie\LaravelAnalytics\LaravelAnalyticsFacade');
            $loader->alias('PageRender', 'Whole\Core\Render\PageRender');

        });


		$router = $this->app['router'];
		$router->middleware('is_login',\Whole\Core\Http\Middleware\IsLogin::class);
		$router->middleware('is_admin',\Whole\Core\Http\Middleware\IsAdmin::class);
		$router->middleware('permitted_page',\Whole\Core\Http\Middleware\PermittedPage::class);

    }

}
