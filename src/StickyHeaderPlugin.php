<?php

namespace Awcodes\FilamentStickyHeader;

use Closure;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\App;

class StickyHeaderPlugin implements Plugin
{
    use EvaluatesClosures;

    protected bool | Closure | null $isColored = null;

    protected bool | Closure | null $isFloating = null;

    protected bool | Closure | null $stickOnListPages = null;

    public function boot(Panel $panel): void
    {
        FilamentAsset::registerScriptData([
            'stickyHeaderTheme' => $this->getTheme(),
            'stickyHeaderActive' => $this->shouldStick(),
        ], 'awcodes-sticky-header');
    }

    public function colored(bool | Closure $condition = true): static
    {
        $this->isColored = $condition;

        return $this;
    }

    public function floating(bool | Closure $condition = true): static
    {
        $this->isFloating = $condition;

        return $this;
    }

    public function stickOnListPages(bool | Closure $condition = true): static
    {
        $this->stickOnListPages = $condition;

        return $this;
    }

    public static function get(): Plugin
    {
        return filament(App::make(static::class)->getId());
    }

    public function getId(): string
    {
        return 'awcodes-sticky-header';
    }

    public function isColored(): bool
    {
        return $this->evaluate($this->isColored) ?? false;
    }

    public function isFloating(): bool
    {
        return $this->evaluate($this->isFloating) ?? false;
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
        return App::make(static::class);
    }

    public function register(Panel $panel): void
    {
        //
    }

    public function shouldStickOnListPages(): bool
    {
        return $this->evaluate($this->stickOnListPages) ?? true;
    }

    public function shouldStick(): bool
    {
        if (
            str(request()->route()->getAction('as'))->contains('index')
            && ! $this->shouldStickOnListPages()
        ) {
            return false;
        }

        return true;
    }
}
