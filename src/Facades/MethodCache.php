<?php

namespace Mortezamasumi\MethodCache\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mortezamasumi\MethodCache\MethodCache
 */
class MethodCache extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Mortezamasumi\MethodCache\MethodCacheService::class;
    }
}
