<?php

namespace FilamentStickyHeader\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static static setTheme(string $theme)
 * @method static static disableCss(bool $condition = true)
 * @method static string getTheme()
 * @method static bool isCssDisabled()
 *
 * @see \FilamentStickyHeader\StickyHeader
 */
class StickyHeader extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'sticky-header';
    }
}
