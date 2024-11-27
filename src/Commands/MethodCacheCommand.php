<?php

namespace Morteza Masumi\MethodCache\Commands;

use Illuminate\Console\Command;

class MethodCacheCommand extends Command
{
    public $signature = 'method-cache';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
