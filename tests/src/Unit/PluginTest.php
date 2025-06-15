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
