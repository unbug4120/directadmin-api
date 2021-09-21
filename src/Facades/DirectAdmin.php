<?php

namespace Unbug4120\LaravelDirectAdmin\Facades;

use Illuminate\Support\Facades\Facade;

class DirectAdmin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'unbug4120-laravel-directadmin';
    }
}
