<?php

namespace Mortezamasumi\MethodCache\Facades;

use Illuminate\Support\Facades\Facade;

class MethodCache extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Mortezamasumi\MethodCache\MethodCache::class;
    }
}
