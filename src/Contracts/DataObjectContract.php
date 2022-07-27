<?php

declare(strict_types=1);

namespace JustSteveKing\DataObjects\Contracts;

interface DataObjectContract
{
    /**
     * @return array<string,mixed>
     */
    public function toArray(): array;
}
