## Filament Sticky Header

:bangbang: Does not work in Safari < v16.

A Filament Admin plugin to make headers sticky when scrolling.

## Installation

Install packages via composer

```bash
composer require awcodes/filament-sticky-header
```

## Usage

By default, sticky header will work out of the box, but you can modify its behavior through the `StickyHeader` facade via the `register()` method in a service provider.

```php
use FilamentStickyHeader\Facades\StickyHeader;

public function register(): void
{
    StickyHeader::floating()
        ->colors(light: '#fef3c7', dark: '#d97706')
        ->opacity(0.7);
}
```

## Assets

This plugin will automatically load its assets via Filament. If you wish to disable this behavior, you can do so via the `disableLoadingAssets()` method.

```php
use FilamentStickyHeader\Facades\StickyHeader;

public function register(): void
{
    StickyHeader::disableLoadingAssets();
}
```

You will also need to publish the plugin's assets to your public directory. Remember to use the force flag each time you upgrade the plugin.

```bash
php artisan vendor:publish --tag="filament-sticky-header-assets" --force
```

Then load the plugin's CSS and JS files manually in your app.
