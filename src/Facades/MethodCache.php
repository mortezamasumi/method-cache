<?php

namespace MortezaMasumi\MethodCache\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \MortezaMasumi\MethodCache\MethodCache
 */
class MethodCache extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \MortezaMasumi\MethodCache\MethodCacheService::class;
    }
}
