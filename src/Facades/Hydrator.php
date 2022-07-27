<?php

declare(strict_types=1);

namespace JustSteveKing\DataObjects\Facades;

use Illuminate\Support\Facades\Facade;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;
use JustSteveKing\DataObjects\Hydrator\Hydrate;

/**
 * @method static DataObjectContract fill(string $class, array $properties)
 *
 * @see \JustSteveKing\DataObjects\Hydrator\Hydrate;
 */
final class Hydrator extends Facade
{
    /**
     * @return class-string
     */
    protected static function getFacadeAccessor(): string
    {
        return Hydrate::class;
    }
}
