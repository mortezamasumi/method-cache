<?php

namespace Tests;

use Mortezamasumi\MethodCache\MethodCacheServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            MethodCacheServiceProvider::class
        ];
    }
}
