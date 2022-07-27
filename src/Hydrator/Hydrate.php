<?php

declare(strict_types=1);

namespace JustSteveKing\DataObjects\Hydrator;

use EventSauce\ObjectHydrator\ObjectMapperUsingReflection;
use JustSteveKing\DataObjects\Contracts\DataObjectContract;
use JustSteveKing\DataObjects\Contracts\HydratorContract;

class Hydrate implements HydratorContract
{
    /**
     * @param ObjectMapperUsingReflection $mapper
     */
    public function __construct(
        private readonly ObjectMapperUsingReflection $mapper = new ObjectMapperUsingReflection(),
    ) {
    }

    /**
     * @param class-string<DataObjectContract> $class
     * @param array<string,mixed> $properties
     * @return DataObjectContract
     */
    public function fill(string $class, array $properties): DataObjectContract
    {
        return $this->mapper->hydrateObject(
            className: $class,
            payload: $properties,
        );
    }
}
