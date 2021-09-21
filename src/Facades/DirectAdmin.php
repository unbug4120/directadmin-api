<?php

namespace Gegeriyadi\LaravelDirectAdmin\Facades;

use Illuminate\Support\Facades\Facade;

class DirectAdmin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'gegeriyadi-laravel-directadmin';
    }
}
