<?php

namespace Mortezamasumi\MethodCache\Facades;

use Illuminate\Support\Facades\Facade;
use Mortezamasumi\MethodCache\MethodCacheService;

class MethodCache extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return MethodCacheService::class;
    }
}
