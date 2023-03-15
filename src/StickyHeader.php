<?php

namespace FilamentStickyHeader;

use Illuminate\Support\Str;

class StickyHeader
{
    protected string $theme = 'default';

    protected bool $isCssDisabled = false;

    public function setTheme(string $theme): static
    {
        $this->theme = Str::slug($theme);

        return $this;
    }

    public function disableCss(bool $condition = true): static
    {
        $this->isCssDisabled = $condition;

        return $this;
    }

    public function getTheme(): string
    {
        return $this->theme;
    }

    public function isCssDisabled(): bool
    {
        return $this->isCssDisabled;
    }
}