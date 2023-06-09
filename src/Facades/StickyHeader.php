<?php

namespace FilamentStickyHeader\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static static colors(string $light, string $dark)
 * @method static static floating()
 * @method static static opacity(float|int $opacity)
 * @method static static disableLoadingAssets(bool $condition = true)
 * @method static static disableStickyTopBar(bool $condition = true)
 * @method static string isFloating()
 * @method static bool shouldLoadAssets()
 * @method static bool isTopBarSticky()
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
