---
title: Configuration
description: Choose a theme and control which pages get a sticky header.
---

# Configuration

Everything is set with chained methods on `StickyHeaderPlugin` in your panel provider.

## Floating theme

`floating()` swaps the default full-width bar for a rounded, translucent card inset from the page edges:

```php
use Awcodes\StickyHeader\StickyHeaderPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            StickyHeaderPlugin::make()
                ->floating(),
        ]);
}
```

![A scrolled Filament users list whose page header is pinned as a rounded, translucent card inset from the page edges, with the table rows blurred behind it](assets/floating-light.png#gh-light-mode-only)
![A scrolled Filament users list whose page header is pinned as a rounded, translucent card inset from the page edges, with the table rows blurred behind it](assets/floating-dark.png#gh-dark-mode-only)

## Coloured theme

`colored()` fills the floating card with the panel's primary colour and lightens the heading and breadcrumb text to match:

```php
StickyHeaderPlugin::make()
    ->floating()
    ->colored()
```

![A scrolled Filament users list whose page header is pinned as a rounded card filled with the panel's primary colour, with a white Users heading and lightened breadcrumbs](assets/colored-light.png#gh-light-mode-only)
![A scrolled Filament users list whose page header is pinned as a rounded card filled with the panel's primary colour, with a white Users heading and lightened breadcrumbs](assets/colored-dark.png#gh-dark-mode-only)

> [!IMPORTANT]
> `colored()` only takes effect alongside `floating()`. On its own it does nothing — the theme resolves to the default bar — so the two are always used together.

## Conditional themes

Both methods accept a closure, evaluated when the page renders. This is what makes the theme a user preference rather than a panel-wide decision:

```php
use Awcodes\StickyHeader\StickyHeaderPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            StickyHeaderPlugin::make()
                ->floating(fn (): bool => auth()->user()->use_floating_header)
                ->colored(fn (): bool => auth()->user()->use_floating_header),
        ]);
}
```

Because `colored()` depends on `floating()`, a condition applied to one usually belongs on the other too.

## Disabling on list pages

List pages are sticky like everything else. Pass `false` to leave them alone:

```php
StickyHeaderPlugin::make()
    ->stickOnListPages(false)
```

This is worth considering when your tables have their own sticky header row, which would otherwise sit under the page header.

The check matches on the page's route name containing `index`, which is how Filament names resource list routes. A closure works here too, if the decision depends on the user or the request.

## Disabling on specific pages

`disabledOn()` takes an array of page classes that should keep a normal header:

```php
use Awcodes\StickyHeader\StickyHeaderPlugin;
use App\Filament\Pages\AnotherPage;
use App\Filament\Pages\MyCustomPage;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            StickyHeaderPlugin::make()
                ->disabledOn([
                    MyCustomPage::class,
                    AnotherPage::class,
                ]),
        ]);
}
```

A closure returning the array lets the list be built at runtime:

```php
StickyHeaderPlugin::make()
    ->disabledOn(fn () => [MyCustomPage::class])
```

Any class exposing a static `getRouteName()` can be named here, which covers resource pages as well as custom ones — so a single edit page can be excluded without affecting the rest of its resource:

```php
use App\Filament\Resources\Orders\Pages\EditOrder;

StickyHeaderPlugin::make()
    ->disabledOn([
        EditOrder::class,
    ])
```

Classes without that method are ignored rather than raising an error, so a typo here fails quietly — check the page still scrolls as you expect after adding one.
