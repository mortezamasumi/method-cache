<?php

namespace Tests\Services;

use Illuminate\Support\Str;
use Mortezamasumi\MethodCache\Attributes\Cacheable;
use Mortezamasumi\MethodCache\Contracts\HasCacheableMethods;

class TestService implements HasCacheableMethods
{
    #[Cacheable(ttl: 1, key: 'cached-method')]
    public function getUuid(): string
    {
        return Str::uuid();
    }
}
