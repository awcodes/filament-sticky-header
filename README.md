# Filament Sticky Header

A Filament Panel plugin to make page headers sticky when scrolling.

[![Latest Version](https://img.shields.io/github/release/awcodes/filament-sticky-header.svg?style=flat-square&color=blue&label=Release)](https://github.com/awcodes/filament-sticky-header/releases)
[![MIT Licensed](https://img.shields.io/badge/License-MIT-blue.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/awcodes/filament-sticky-header.svg?style=flat-square&color=blue&label=Downloads)](https://packagist.org/packages/awcodes/filament-sticky-header)
[![GitHub Repo stars](https://img.shields.io/github/stars/awcodes/filament-sticky-header?style=flat-square&color=blue&label=Stars)](https://github.com/awcodes/filament-sticky-header/stargazers)

## Compatibility

| Package Version | Filament Version |
|-----------------|------------------|
| 1.x             | 2.x              |
| 2.x             | 3.x              |
| 3.x             | 4.x              |
| 4.x             | 5.x              |

<!-- [docs_start] -->

## Installation

Install packages via composer

```bash
composer require awcodes/filament-sticky-header
```

> [!IMPORTANT]
> If you have not set up a custom theme and are using Filament Panels follow the instructions in the [Filament Docs](https://filamentphp.com/docs/4.x/styling/overview#creating-a-custom-theme) first.

After setting up a custom theme add the plugin's views to your theme css file or your app's css file if using the standalone packages.

```css
@import '../../../../vendor/awcodes/filament-sticky-header/resources/css/plugin.css';
```

## Usage

Just add the plugin to your panel provider, and you're good to go.

```php
use Awcodes\StickyHeader\StickyHeaderPlugin;

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
use Awcodes\StickyHeader\StickyHeaderPlugin;

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
use Awcodes\StickyHeader\StickyHeaderPlugin;

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

### Disabling on List Pages

To disable the sticky header on list pages, you can use the `stickOnListPages()` method.

```php
use Awcodes\StickyHeader\StickyHeaderPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            StickyHeaderPlugin::make()
                ->stickOnListPages(false)
        ])
    ]);
}
```

<!-- [docs_end] -->

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
