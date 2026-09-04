<?php

declare(strict_types=1);

namespace Awcodes\StickyHeader;

use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class StickyHeaderServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('awcodes-sticky-header');
    }

    public function packageRegistered(): void
    {
        parent::packageRegistered();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Js::make('awcodes-sticky-header', __DIR__.'/../resources/dist/sticky-header.js'),
        ], 'awcodes-sticky-header');
    }
}
