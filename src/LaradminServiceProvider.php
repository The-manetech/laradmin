<?php

namespace Laradmin;

use Illuminate\Support\ServiceProvider;

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
    }


    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
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
            ]);
        }
    }
}
