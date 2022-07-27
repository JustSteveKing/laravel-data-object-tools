<?php

declare(strict_types=1);

use JustSteveKing\DataObjects\Facades\Hydrator;
use JustSteveKing\DataObjects\Tests\Stubs\Test;

it('can create a data transfer object', function (string $string) {
    expect(
        Hydrator::fill(
            class: Test::class,
            properties: ['name' => $string],
        ),
    )->toBeInstanceOf(Test::class)->toArray()->toEqual(['name' => $string]);
})->with('strings');

it('creates our data transfer object as we would expect', function (string $string) {
    $test = Hydrator::fill(
        class: Test::class,
        properties: ['name' => $string],
    );

    $reflection = new ReflectionClass(
        objectOrClass: $test,
    );

    expect(
        $reflection->getProperty(
            name: 'name',
        )->isReadOnly()
    )->toBeTrue()->and(
        $reflection->getProperty(
            name: 'name',
        )->isPrivate(),
    )->toBeTrue()->and(
        $reflection->getMethod(
            name: 'toArray',
        )->hasReturnType(),
    )->toBeTrue();
})->with('strings');
