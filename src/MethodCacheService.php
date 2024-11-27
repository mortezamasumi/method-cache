<?php

namespace MortezaMasumi\MethodCache;

use Illuminate\Support\Facades\Cache;

class MethodCacheService
{
    public function flush(): void
    {
        collect(Cache::get('methodcached-keys', []))->each(fn($key) => Cache::forget($key));
        Cache::forget('methodcached-keys');
    }
}
