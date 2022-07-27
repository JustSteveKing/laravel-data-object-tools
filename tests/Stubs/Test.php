<?php

declare(strict_types=1);

namespace JustSteveKing\DataObjects\Tests\Stubs;

use JustSteveKing\DataObjects\Contracts\DataObjectContract;

final class Test implements DataObjectContract
{
    public function __construct(
        private readonly string $name,
    ) {
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
