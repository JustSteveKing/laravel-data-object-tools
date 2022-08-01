# Laravel Data Object Tools

<!-- BADGES_START -->
[![Latest Version][badge-release]][packagist]
[![PHP Version][badge-php]][php]
[![Tests][badge-tests]][tests]
[![Total Downloads][badge-downloads]][downloads]

[badge-tests]: https://github.com/juststeveking/laravel-data-object-tools/actions/workflows/test.yml/badge.svg
[badge-release]: https://img.shields.io/packagist/v/juststeveking/laravel-data-object-tools.svg?style=flat-square&label=release
[badge-php]: https://img.shields.io/packagist/php-v/juststeveking/laravel-data-object-tools.svg?style=flat-square
[badge-downloads]: https://img.shields.io/packagist/dt/juststeveking/laravel-data-object-tools.svg?style=flat-square&colorB=mediumvioletred

[packagist]: https://packagist.org/packages/juststeveking/laravel-data-object-tools
[php]: https://php.net
[downloads]: https://packagist.org/packages/juststeveking/laravel-data-object-tools
[tests]: https://github.com/juststeveking/laravel-data-object-tools/actions/workflows/test.yml
<!-- BADGES_END -->

This package is aimed to be a suite of tools to help working with DTOs even easier.
It includes an artisan command to generate DTOs as well as a facade to help you hydrate them.

## Installation

```bash
composer require juststeveking/laravel-data-object-tools
```

## Usage

To generate a new DTO all you need to do is run the following artisan command:

```bash
php artisan make:dto MyDto
```

This will generate the following class: `app/DataObjects/MyDto.php`. By default this class
will be a `final` class that implements a `DataObjectContract` which enforces a method `toArray` so that you can 
easily cast your DTOs to arrays.

If you are using PHP 8.2 however, you will by default get a `readonly` class generated, so that you do not have
to declare each property as readonly.

To work with the hydration functionality you can either use Laravels DI container, or the ready made facade.

Using the container:

```php
class StoreController
{
    public function __construct(
        private readonly HydratorContract $hydrator,
    ) {}
    
    public function __invoke(StoreRequest $request)
    {
        $model = Model::query()->create(
            attributes: $this->hydrator->fill(
                class: ModelObject::class,
                parameters: $request->validated(),
            )->toArray(),
        );
    }
}
```

To work with the facade, you can do something very similar:

```php
class StoreController
{
    public function __invoke(StoreRequest $request)
    {
        $model = Model::query()->create(
            attributes: Hydrator::fill(
                class: ModelObject::class,
                parameters: $request->validated(),
            )->toArray(),
        );
    }
}
```

## Object Hydration

Under the hood this package uses an [EventSauce](https://eventsauce.io) package, created by [Frank de Jonge](https://twitter.com/frankdejonge). It is possibly the
best package I have found to hydrate objects nicely in PHP. You can find the [documentation here](https://github.com/EventSaucePHP/ObjectHydrator)
if you would like to see what else you are able to do with the package to suit your needs.

## Testing

To run the test suite:

```bash
composer run test
```

## Credits

- [Steve McDougall](https://github.com/JustSteveKing)
- [All Contributors](../../contributors)

## LICENSE

The MIT License (MIT). Please see [License File](./LICENSE) for more information.

