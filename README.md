## Filament Sticky Header

:bangbang: Does not work in Safari < v16.

A Filament Admin plugin to make headers sticky when scrolling.

## Installation

Install packages via composer

```bash
composer require awcodes/filament-sticky-header
```

## Usage

By default, sticky header will work out of the box, but you can modify its behavior through the `StickyHeader` facade via the `boot()` in a service provider.

### Floating Theme

To use the new 'Floating Theme' just pass the 'floating' key to the `setTheme()` method in a service provider. 

```php
use FilamentStickyHeader\Facades\StickyHeader;

public function boot(): void
{
    Filament::serving(function () {
        StickyHeader::setTheme('floating');
    }
}
```

## Usage with Custom Filament Themes

If you are using a custom Filament Theme you will need to disable the loading of the CSS file.

```php
use FilamentStickyHeader\Facades\StickyHeader;

public function boot(): void
{
    Filament::serving(function () {
        StickyHeader::disableCss();
    }
}
```

Then incorporate the plugin's styles into your theme's css file.

```css
@import "<path-to-vendor>/vendor/awcodes/filament-sticky-header/resources/css/plugin.css";
```