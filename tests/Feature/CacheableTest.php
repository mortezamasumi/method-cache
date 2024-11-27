<?php

use MortezaMasumi\MethodCache\Tests\Services\TestService;

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
