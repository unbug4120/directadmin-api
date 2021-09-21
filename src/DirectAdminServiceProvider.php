<?php

namespace Gegeriyadi\LaravelDirectAdmin;

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
        $this->app->bind('gegeriyadi-laravel-directadmin', function() {
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
