## Filament Sticky Header

> **Warning**
> Does not work in Safari < v16.

A Filament Admin plugin to make page headers sticky when scrolling.

![sticky-header-og](https://res.cloudinary.com/aw-codes/image/upload/w_1200,f_auto,q_auto/plugins/sticky-header/awcodes-sticky-header.jpg)

## Installation

Install packages via composer

```bash
composer require awcodes/filament-sticky-header
```

## Usage

Just add the plugin to your panel provider, and you're good to go.

```php
use Awcodes\FilamentStickyHeader\StickyHeaderPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            StickyHeaderPlugin::make(),
        ])
    ])
}
```

### Floating Theme

To use the 'Floating Theme' use the `floating()` method when instantiating the plugin.

When using the floating theme you can also use the `colored()` method to add your primary background color to the header.

```php
use Awcodes\FilamentStickyHeader\StickyHeaderPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            StickyHeaderPlugin::make()
                ->floating()
                ->colored()
        ])
    ]);
}
```

Both the `floating()` and `colored()` methods can receive closure that will be evaluated to determine if the theme should be applied. This allows you to apply the theme conditionally, for instance, based off of user preferences.

```php
use Awcodes\FilamentStickyHeader\StickyHeaderPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            StickyHeaderPlugin::make()
                ->floating(fn():bool => auth()->user()->use_floating_header)
                ->colored(fn():bool => auth()->user()->use_floating_header)
        ])
    ]);
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Adam Weston](https://github.com/awcodes)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
