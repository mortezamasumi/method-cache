<?php

namespace Mortezamasumi\MethodCache\Actions;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Mortezamasumi\MethodCache\Attributes\Cacheable;
use Mortezamasumi\MethodOverrider\MethodOverrider;
use ReflectionClass;

class OverrideCacheableMethodClassAction
{
    public function handle(string $class): void
    {
        $reflection = new ReflectionClass($class);
        $methods = $reflection->getMethods();

        $methodsToOverride = collect($methods)->firstWhere(function ($method) {
            return count($method->getAttributes(Cacheable::class)) > 0;
        });

        $attribute = $methodsToOverride->getAttributes(Cacheable::class)[0];
        $cacheableInstance = $attribute->newInstance();

        $keys = Cache::get('methodcached-keys', []);
        $keys[] = $cacheableInstance->key;
        Cache::forever('methodcached-keys', $keys);

        $methodImplementation = function ($original) use ($cacheableInstance) {
            return Cache::remember(
                key: $cacheableInstance->key,
                ttl: $cacheableInstance->ttl,
                callback: fn () => $original(),
            );
        };

        $methodOverrider = resolve(MethodOverrider::class);
        $result = $methodOverrider->generateOverriddenClass(
            class: $class,
            methodNames: $methodsToOverride->name,
            implementations: $methodImplementation,
        );

        $filePath = storage_path('framework/cache/'.$result['className'].'.php');
        File::put($filePath, $result['content']);

        try {
            require_once $filePath;
            $className = $result['className'];
            $overridenClassInstance = new $className($result['implementations']);
        } finally {
            File::delete($filePath);
        }

        app()->bind($class, fn () => $overridenClassInstance);
    }
}
