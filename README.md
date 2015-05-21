# Less.php wrapper for dc/bundler

Enables you to compile Less files using dc/bundler.

## Installation

```
composer require dc/bundler-less
```

or in `composer.json`

```json
"require": {
    "dc/bundler-less": "dev-master"
}
```

## Setup

This package depends on `dc/router`, but strongly suggests `dc/ioc`. This is how you register the transformer with
the IoC container so it is picked up automatically.

```php
$container
    ->register('\DC\Bundler\Less\LessTransformer')
    ->to('\DC\Bundler\ITransformer');
```