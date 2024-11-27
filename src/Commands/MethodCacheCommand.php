<?php

namespace MortezaMasumi\MethodCache\Commands;

use Illuminate\Console\Command;
use MortezaMasumi\MethodCache\Facades\MethodCache;

class MethodCacheCommand extends Command
{
    protected $signature = 'methodcache:flush';

    protected $description = 'Flush all items cached by our cachable attribute.';

    public function handle(): void
    {
        MethodCache::flush();
    }
}
