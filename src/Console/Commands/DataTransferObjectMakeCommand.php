<?php

declare(strict_types=1);

namespace JustSteveKing\DataObjects\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

final class DataTransferObjectMakeCommand extends GeneratorCommand
{
    /**
     * @var string
     */
    protected $name = "make:dto {name : The DTO Name}";

    /**
     * @var string
     */
    protected $description = "Create a new DTO";

    /**
     * @var string
     */
    protected $type = 'Data Transfer Object';

    /**
     * @return string
     */
    protected function getStub(): string
    {
        $readonly = Str::contains(
            haystack: PHP_VERSION,
            needles: '8.2',
        );

        $file = $readonly ? 'dto-82.stub' : 'dto.stub';

        return __DIR__ . "/../../../stubs/{$file}";
    }

    /**
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return "{$rootNamespace}\\DataObjects";
    }
}
