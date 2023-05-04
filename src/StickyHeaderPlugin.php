<?php

namespace FilamentStickyHeader;

use Filament\Context;
use Filament\Contracts\Plugin;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;

class StickyHeaderPlugin implements Plugin
{
    protected string $theme = 'default';

    protected bool $isTopBarSticky = true;

    public function getId(): string
    {
        return 'filament-sticky-header';
    }

    public function register(Context $context): void
    {
        FilamentAsset::register([
            Css::make('filament-sticky-header', __DIR__ . '/../resources/dist/filament-sticky-header.css'),
            Js::make('filament-sticky-header', __DIR__ . '/../resources/dist/filament-sticky-header.js'),
        ], 'filament-sticky-header');

        FilamentAsset::registerScriptData([
            'stickyHeaderTheme' => $this->getTheme(),
            'stickyTopBar' => $this->isTopBarSticky(),
        ],'filament-sticky-header');
    }

    public function boot(Context $context): void
    {
        //
    }


    public function setTheme(string $theme): static
    {
        $this->theme = $theme;

        return $this;
    }

    public function disableTopBarSticky(bool $condition = false): static
    {
        $this->isTopBarSticky = $condition;

        return $this;
    }

    public function getTheme(): string
    {
        return $this->theme;
    }

    public function isTopBarSticky(): bool
    {
        return $this->isTopBarSticky;
    }
}