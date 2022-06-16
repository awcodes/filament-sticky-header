<?php

namespace FilamentStickyHeader;

use Filament\PluginServiceProvider;

class FilamentStickyHeaderServiceProvider extends PluginServiceProvider
{
    protected array $styles = [
        'filament-sticky-header-styles' => __DIR__ . '/../resources/dist/filament-sticky-header.css',
    ];

    protected array $scripts = [
        'filament-sticky-header-scripts' => __DIR__ . '/../resources/dist/filament-sticky-header.js',
    ];
}
