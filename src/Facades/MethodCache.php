<?php

namespace Morteza Masumi\MethodCache\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Morteza Masumi\MethodCache\MethodCache
 */
class MethodCache extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Morteza Masumi\MethodCache\MethodCache::class;
    }
}
