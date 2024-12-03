<?php

namespace Mortezamasumi\MethodCache;

use Illuminate\Support\Facades\Cache;

class MethodCache
{
    public function flush(): void
    {
        collect(Cache::get('methodcached-keys', []))->each(fn($key) => Cache::forget($key));

        Cache::forget('methodcached-keys');
    }
}
