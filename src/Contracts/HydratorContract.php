<?php

declare(strict_types=1);

namespace JustSteveKing\DataObjects\Contracts;

interface HydratorContract
{
    /**
     * @param class-string<DataObjectContract> $class
     * @param array<string,mixed> $properties
     * @return DataObjectContract
     */
    public function fill(string $class, array $properties): DataObjectContract;
}
