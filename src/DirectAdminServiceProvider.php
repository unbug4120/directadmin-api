<?php

namespace Unbug4120\LaravelDirectAdmin;

use Illuminate\Support\ServiceProvider;

class DirectAdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('unbug4120-laravel-directadmin', function() {
            return new DirectAdmin();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/directadmin.php' => config_path('directadmin.php')
        ], 'directadmin-config');
    }
}
