<?php

declare(strict_types=1);

use Illuminate\Support\Facades\File;
use JustSteveKing\DataObjects\Console\Commands\DataTransferObjectMakeCommand;

use function PHPUnit\Framework\assertTrue;

it('can run the command successfully', function () {
    $this
        ->artisan(DataTransferObjectMakeCommand::class, ['name' => 'Test'])
        ->assertSuccessful();
});

it('create the data transfer object when called', function (string $class) {
    $this->artisan(
        DataTransferObjectMakeCommand::class,
        ['name' => $class],
    )->assertSuccessful();

    assertTrue(
        File::exists(
            path: app_path("DataObjects/$class.php"),
        ),
    );
})->with('classes');
