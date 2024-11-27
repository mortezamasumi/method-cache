<?php

namespace MortezaMasumi\MethodCache\Tests\Services;

use Illuminate\Support\Str;
use MortezaMasumi\MethodCache\Attributes\Cacheable;
use MortezaMasumi\MethodCache\Contracts\HasCacheableMethods;

class TestService implements HasCacheableMethods
{
    #[Cacheable(ttl: 1, key: 'cached-method')]
    public function getUuid(): string
    {
        return Str::uuid();
    }
}
