<?php

namespace FilamentStickyHeader;

use Filament\Context;
use Filament\Contracts\Plugin;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;

class StickyHeaderPlugin implements Plugin
{

    public function getId(): string
    {
        return 'filament-sticky-header';
    }

    public function register(Context $context): void
    {
        FilamentAsset::register(array_merge(
            $this->getStyles(),
            $this->getScripts()
        ), 'filament-sticky-header');
    }

    public function boot(Context $context): void
    {
        // TODO: Implement boot() method.
    }

    public function getStyles(): array
    {
        if (! app('sticky-header')->isCssDisabled()) {
            return [
                Css::make('filament-sticky-header', __DIR__ . '/../resources/dist/filament-sticky-header.css'),
            ];
        }

        return [];
    }

    protected function getScripts(): array
    {
        return [
            Js::make('filament-sticky-header', __DIR__ . '/../resources/dist/filament-sticky-header.js')
        ];
    }
}