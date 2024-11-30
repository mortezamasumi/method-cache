<?php

use Illuminate\Support\Facades\Cache;
use Mortezamasumi\MethodCache\Tests\Services\TestService;

it('caches a specific method', function () {
    // Arrange
    $service = app(TestService::class);

    // Act
    $uuid = $service->getUuid();

    // Assert
    expect($service->getUuid())->toBe($uuid);
    expect($service->getUuid())->toBe($uuid);
    sleep(1);
    expect($service->getUuid())->not()->toBe($uuid);
});

it('caches a cachabel method under the right key', function () {
    // Assert
    expect(Cache::get('cached-method'))->toBeNull();

    // Arrange
    $service = app(TestService::class);

    // Act
    $service->getUuid();

    // Assert
    expect(Cache::get('cached-method'))->not()->toBeNull();
});
