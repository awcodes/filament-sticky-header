<?php

declare(strict_types=1);

namespace Awcodes\StickyHeader;

use Closure;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use Filament\Support\Facades\FilamentAsset;

class StickyHeaderPlugin implements Plugin
{
    use EvaluatesClosures;

    protected array | Closure $disabledOn = [];

    protected bool | Closure | null $isColored = null;

    protected bool | Closure | null $isFloating = null;

    protected bool | Closure | null $stickOnListPages = null;

    public static function get(): static
    {
        return filament(app(static::class)->getId());
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function boot(Panel $panel): void
    {
        FilamentAsset::registerScriptData([
            'stickyHeaderTheme' => $this->getTheme(),
            'stickyHeaderActive' => $this->shouldStick(),
        ], 'awcodes-sticky-header');
    }

    public function disabledOn(array | Closure $pages): static
    {
        $this->disabledOn = $pages;

        return $this;
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

    public function getDisabledPages(): array
    {
        return $this->evaluate($this->disabledOn) ?? [];
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
        $routeName = str(request()->route()->getAction('as'));

        if ($routeName->contains('index') && ! $this->shouldStickOnListPages()) {
            return false;
        }

        foreach ($this->getDisabledPages() as $pageClass) {
            if (method_exists($pageClass, 'getRouteName') && (string) $routeName === $pageClass::getRouteName()) {
                return false;
            }
        }

        return true;
    }
}
