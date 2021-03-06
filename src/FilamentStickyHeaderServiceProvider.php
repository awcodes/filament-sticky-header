<?php

namespace FilamentStickyHeader;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentStickyHeaderServiceProvider extends PluginServiceProvider
{
    protected array $styles = [
        'filament-sticky-header-styles' => __DIR__ . '/../resources/dist/filament-sticky-header.css',
    ];

    protected array $beforeCoreScripts = [
        'filament-sticky-header-scripts' => __DIR__ . '/../resources/dist/filament-sticky-header.js',
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-sticky-header')
            ->hasAssets();
    }
}
