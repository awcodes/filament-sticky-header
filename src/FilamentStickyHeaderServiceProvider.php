<?php

namespace FilamentStickyHeader;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentStickyHeaderServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-sticky-header';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasAssets();
    }

    public function packageRegistered(): void
    {
        parent::packageRegistered();

        $this->app->singleton('sticky-header', fn (): StickyHeader => new StickyHeader());
    }
}
