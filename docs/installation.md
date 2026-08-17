---
title: Installation
description: Install Sticky Header, register the plugin with a panel, and import its stylesheet.
---

# Installation

## Requirements

- PHP 8.2 or higher
- Filament 4.x or 5.x

Earlier releases of this package support earlier versions of Filament:

| Package Version | Filament Version |
| --- | --- |
| 1.x | 2.x |
| 2.x | 3.x |
| 3.x | 4.x |
| 4.x | 4.x & 5.x |

## Install the package

Install with Composer:

```bash
composer require awcodes/filament-sticky-header
```

The service provider is registered automatically, and there is no configuration file to publish.

## Register the plugin

Add the plugin to the panel:

```php
use Awcodes\StickyHeader\StickyHeaderPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            StickyHeaderPlugin::make(),
        ]);
}
```

That is everything. With no further configuration, every page in the panel gets a sticky header in the default theme.

## Import the stylesheet

Add the package's stylesheet to your theme's CSS file:

```css
@import '../../../../vendor/awcodes/filament-sticky-header/resources/css/plugin.css';
```

If you are using the standalone Filament packages rather than Panels, add the same line to your application's CSS file.

> [!IMPORTANT]
> Panel users need a custom theme before this line has anywhere to live. If you have not created one yet, follow [Creating a custom theme](https://filamentphp.com/docs/4.x/styling/overview#creating-a-custom-theme) in the Filament documentation first.

The relative path above assumes the conventional theme location, `resources/css/filament/<panel>/theme.css`. Adjust the number of `../` segments if your theme lives elsewhere — the path has to resolve to `vendor/awcodes/filament-sticky-header/resources/css/plugin.css` from the file it is written in.

> [!NOTE]
> This is an `@import` of a stylesheet, not the `@source` directive other Filament plugins use. Sticky Header ships real CSS rather than classes to be scanned out of Blade views, so `@source` would find nothing.

Without this import the JavaScript still runs and the header still becomes sticky, but with no styling to distinguish it — no background, no border, no shadow — so it will overlap the content beneath it.

## Next steps

See [Configuration](configuration.md) for themes and for turning the header off on particular pages.
