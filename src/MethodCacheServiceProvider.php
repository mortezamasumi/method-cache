<?php

namespace MortezaMasumi\MethodCache;

use Illuminate\Support\ServiceProvider;
use MortezaMasumi\MethodCache\Actions\OverrideCacheableMethodClassAction;
use MortezaMasumi\MethodCache\Commands\MethodCacheCommand;
use MortezaMasumi\MethodCache\Contracts\HasCacheableMethods;

class MethodCacheServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MethodCacheCommand::class,
            ]);
        }

        $this->rebindCacheableClasses();
    }

    protected function rebindCacheableClasses(): void
    {
        $this->app->beforeResolving(function ($abstract) {
            $class = is_string($abstract) ? $abstract : get_class($abstract);

            if (! class_exists($class)) {
                return;
            }

            if (! in_array(HasCacheableMethods::class, class_implements($class) ?: [], true)) {
                return;
            }

            app(OverrideCacheableMethodClassAction::class)->handle($class);
        });
    }
}
