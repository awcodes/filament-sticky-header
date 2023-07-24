<?php

namespace Awcodes\FilamentStickyHeader;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Facades\FilamentAsset;

class StickyHeaderPlugin implements Plugin
{
    protected ?bool $isColored = null;

    protected ?bool $isFloating = null;

    public function boot(Panel $panel): void
    {
        //
    }

    public function colored(bool $condition = true): static
    {
        $this->isColored = $condition;

        return $this;
    }

    public function floating(bool $condition = true): static
    {
        $this->isFloating = $condition;

        return $this;
    }

    public static function get(): static
    {
        return filament(app(static::class)->getId());
    }

    public function getId(): string
    {
        return 'awcodes-sticky-header';
    }

    public function isColored(): bool
    {
        return $this->isColored ?? false;
    }

    public function isFloating(): bool
    {
        return $this->isFloating ?? false;
    }

    public function getTheme(): string
    {
        if ($this->isFloating()) {

            if ($this->isColored()) {
                return 'floating-colored';
            }

            return 'floating';
        }

        return 'default';
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function register(Panel $panel): void
    {
        FilamentAsset::registerScriptData([
            'stickyHeaderTheme' => $this->getTheme(),
        ], 'awcodes-sticky-header');
    }
}
