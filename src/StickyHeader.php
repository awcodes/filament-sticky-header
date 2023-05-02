<?php

namespace FilamentStickyHeader;

use Illuminate\Support\Str;

class StickyHeader
{
    protected string $theme = 'default';

    protected bool $isCssDisabled = false;
    
    protected bool $isTopBarSticky = true;

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

    public function isCssDisabled(): bool
    {
        return $this->isCssDisabled;
    }
}