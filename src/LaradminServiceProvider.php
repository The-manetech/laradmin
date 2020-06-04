<?php

namespace Laradmin;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;


use Laradmin\Facades\Laradmin as Facade;
use Laradmin\Commands\DoctorCommand;
use Laradmin\Providers\AppServiceProvider;
use Laradmin\Providers\RouteServiceProvider;

class LaradminServiceProvider extends ServiceProvider
{
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('laradmin', function () {

            return new Laradmin();

        });

        laradmin()->bootstrap();


        /**
         * Register base service providers for laradmin apps
         */
        $this->app->register(AppServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);


    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot( Router $router)
    {


        $this->loadViewsFrom( laradmin()->root('resources/views'), 'laradmin');

        $router->aliasMiddleware('laradmin.user', Authenticate::class);

        $router->aliasMiddleware('laradmin.guest', RedirectIfAuthenticated::class);

        $this->loadTranslationsFrom( laradmin()->root('publish/lang'), 'laradmin');



        $this->publishes([
            __DIR__.'/../publish/config/laradmin.php' => config_path('laradmin.php'),
            __DIR__.'/../publish/config/laradmin_app.php' => config_path('laradmin_app.php')
        ], 'laradmin.config');


        $this->addCommands();
    }


    protected function addCommands()
    {
        if ($this->app->runningInConsole()) {

            $this->commands([

                DoctorCommand::class

            ]);

        }
    }
}
