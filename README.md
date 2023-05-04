## Filament Sticky Header

:bangbang: Does not work in Safari < v16.

A Filament Admin plugin to make page headers sticky when scrolling.

## Installation

Install packages via composer

```bash
composer require awcodes/filament-sticky-header
```

## Usage

By default, sticky header will work out of the box, but you can modify its behavior through the `StickyHeader` facade via the `boot()` in a service provider.

```php
use FilamentStickyHeader\StickyHeaderPlugin;

public function context(Context $context): Context
{
    return $context
        ...
        ->plugins([
            ...
            new StickyHeaderPlugin()
        ])
    ])
}
```

### Floating Theme

To use the new 'Floating Theme' just pass the 'floating' key to the `setTheme()` method when newing up the plugin.

* `setTheme('floating')`
* `setTheme('floating-colored')`

```php
use FilamentStickyHeader\StickyHeaderPlugin;

public function context(Context $context): Context
{
    return $context
        ...
        ->plugins([
            ...
            (new StickyHeaderPlugin())->setTheme('floating')
        ])
    ])
}
```

### Disabling Sticky Top Bar

If you'd like to disable the stickiness of the main Filament Top Bar you may do so with the `disableTopBarSticky()` method.

```php
use FilamentStickyHeader\StickyHeaderPlugin;

public function context(Context $context): Context
{
    return $context
        ...
        ->plugins([
            ...
            (new StickyHeaderPlugin())->disableTopBarSticky()
        ])
    ])
}
```