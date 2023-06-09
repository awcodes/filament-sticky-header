<?php

namespace FilamentStickyHeader;

use Illuminate\Support\Str;

class StickyHeader
{
    protected bool $isFloating = false;

    protected array|null $colors = null;

    protected bool $shouldLoadAssets = true;
    
    protected bool $isTopBarSticky = true;

    protected float|int $opacity = 0.9;

    public function colors(string $light, string $dark): static
    {
        $this->colors = ['light' => $light, 'dark' => $dark];

        return $this;
    }

    public function floating(): static
    {
        $this->isFloating = true;

        return $this;
    }

    public function disableLoadingAssets(bool $condition = false): static
    {
        $this->shouldLoadAssets = $condition;

        return $this;
    }
    
    public function disableStickyTopBar(bool $condition = false): static
    {
        $this->isTopBarSticky = $condition;

        return $this;
    }

    public function opacity(float|int $opacity): static
    {
        $this->opacity = $opacity;

        return $this;
    }

    public function isFloating(): string
    {
        return $this->isFloating;
    }

    public function getColors(): array|null
    {
        return $this->colors;
    }

    public function getOpacity(): float|int
    {
        return $this->opacity;
    }

    public function isTopBarSticky(): bool
    {
        return $this->isTopBarSticky;
    }

    public function shouldLoadAssets(): bool
    {
        return $this->shouldLoadAssets;
    }
}