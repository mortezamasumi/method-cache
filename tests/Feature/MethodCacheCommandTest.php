<?php

use Illuminate\Support\Facades\Cache;
use MortezaMasumi\MethodCache\Commands\MethodCacheCommand;
use MortezaMasumi\MethodCache\Tests\Services\TestService;

it('clears all items cached by our package', function () {
    // Arrange
    $service = app(TestService::class);
    $service->getUuid();
    Cache::put('some-key', 'some-value');

    // Act
    $this->artisan(MethodCacheCommand::class);

    // Assert
    expect(Cache::get('cached-method'))->toBeNull();
    expect(Cache::get('some-key'))->toBe('some-value');
});