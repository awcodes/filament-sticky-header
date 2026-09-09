<?php

declare(strict_types=1);

use Awcodes\StickyHeader\StickyHeaderPlugin;
use Filament\Facades\Filament;
use Filament\Support\Facades\FilamentAsset;
use Workbench\App\Filament\Resources\Users\UserResource;

beforeEach(function () {
    $this->panel = Filament::getCurrentOrDefaultPanel();
});

it('has correct script data', function () {
    $this->panel
        ->plugins([
            StickyHeaderPlugin::make(),
        ]);

    $this->get(UserResource::getUrl('index'))
        ->assertOk();

    expect(FilamentAsset::getScriptData(['awcodes-sticky-header']))
        ->toBe([
            'stickyHeaderTheme' => 'default',
            'stickyHeaderActive' => true,
        ]);
});

it('has correct floating script data', function () {
    $this->panel
        ->plugins([
            StickyHeaderPlugin::make()->floating(),
        ]);

    $this->get(UserResource::getUrl('index'))
        ->assertOk();

    expect(FilamentAsset::getScriptData(['awcodes-sticky-header']))
        ->toBe([
            'stickyHeaderTheme' => 'floating',
            'stickyHeaderActive' => true,
        ]);
});

it('has correct floating colored script data', function () {
    $this->panel
        ->plugins([
            StickyHeaderPlugin::make()->floating()->colored(),
        ]);

    $this->get(UserResource::getUrl('index'))
        ->assertOk();

    expect(FilamentAsset::getScriptData(['awcodes-sticky-header']))
        ->toBe([
            'stickyHeaderTheme' => 'floating-colored',
            'stickyHeaderActive' => true,
        ]);
});

it('has correct disabled on list page script data', function (bool | Closure $enabled) {
    $this->panel
        ->plugins([
            StickyHeaderPlugin::make()->stickOnListPages($enabled),
        ]);

    $this->get(UserResource::getUrl('index'))
        ->assertOk();

    expect(FilamentAsset::getScriptData(['awcodes-sticky-header']))
        ->toBe([
            'stickyHeaderTheme' => 'default',
            'stickyHeaderActive' => false,
        ]);
})->with([
    false,
    fn () => false,
]);
