<?php

namespace Awcodes\FilamentStickyHeader;

use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentStickyHeaderServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('filament-sticky-header');
    }

    public function packageRegistered(): void
    {
        parent::packageRegistered();

        FilamentAsset::register([
            Css::make('filament-sticky-header', __DIR__ . '/../resources/dist/filament-sticky-header.css'),
            Js::make('filament-sticky-header', __DIR__ . '/../resources/dist/filament-sticky-header.js'),
        ], 'filament-sticky-header');
    }
}
