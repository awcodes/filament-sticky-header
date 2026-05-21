<?php

declare(strict_types=1);

use Awcodes\StickyHeader\StickyHeaderPlugin;
use Filament\Facades\Filament;

beforeEach(function () {
    $this->panel = Filament::getCurrentOrDefaultPanel();
});

it('can register the plugin', function () {
    $this->panel
        ->plugins([
            StickyHeaderPlugin::make(),
        ]);

    expect(Filament::getPlugin('awcodes-sticky-header'))->toBeInstanceOf(StickyHeaderPlugin::class);
});

it('can register floating sticky header', function (bool|Closure $enabled) {
    $this->panel
        ->plugins([
            StickyHeaderPlugin::make()->floating($enabled),
        ]);

    expect(Filament::getPlugin('awcodes-sticky-header')->isFloating())->toBeTrue();
})->with([
    true,
    fn () => true,
]);

it('can register colored sticky header', function (bool|Closure $enabled) {
    $this->panel
        ->plugins([
            StickyHeaderPlugin::make()->colored($enabled),
        ]);

    expect(Filament::getPlugin('awcodes-sticky-header')->isColored())->toBeTrue();
})->with([
    true,
    fn () => true,
]);

it('can register disabled pages as array', function () {
    $this->panel
        ->plugins([
            StickyHeaderPlugin::make()->disabledOn(['App\Filament\Pages\CustomPage']),
        ]);

    expect(Filament::getPlugin('awcodes-sticky-header')->getDisabledPages())
        ->toBe(['App\Filament\Pages\CustomPage']);
});

it('can register disabled pages as closure', function () {
    $this->panel
        ->plugins([
            StickyHeaderPlugin::make()->disabledOn(fn () => ['App\Filament\Pages\CustomPage']),
        ]);

    expect(Filament::getPlugin('awcodes-sticky-header')->getDisabledPages())
        ->toBe(['App\Filament\Pages\CustomPage']);
});
