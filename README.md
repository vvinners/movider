# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/vvinners/movider.svg?style=flat-square)](https://packagist.org/packages/vvinners/movider)
[![Total Downloads](https://img.shields.io/packagist/dt/vvinners/movider.svg?style=flat-square)](https://packagist.org/packages/vvinners/movider)
![GitHub Actions](https://github.com/vvinners/movider/actions/workflows/main.yml/badge.svg)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require vvinners/movider
```

Publish config file to app/config

```bash
php artisan vendor:publish --provider="VVinners\Movider\MoviderServiceProvider" --tag=config
php artisan vendor:publish --provider="VVinners\Movider\MoviderServiceProvider" --tag=migration
php artisan migrate --path=/database/migrations/2021_09_22_073143_create_movider_log_table.php 
```

Put this to config/app.php if the package is not auto discovered

```bash
VVinners\Movider\MoviderServiceProvider::class
```

## Usage

You can add Movider credentials into your .env file: 

```php
MOVIDER_API_KEY=************************
MOVIDER_API_SECRET=********************************
```

### Demo

Send SMS API by passing message and phone number
Last variable can be optional

```php
use VVinners\Movider\Movider;

$movider = new Movider;
$response = $moviderProvider->sendMessage('Test', '60123456789', 'MOVIDER');
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email marktan@vvinners.com instead of using the issue tracker.

## Credits

-   [VVinners](https://github.com/vvinners)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
