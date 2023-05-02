<?php

namespace FilamentStickyHeader;

use Composer\InstalledVersions;
use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentStickyHeaderServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-sticky-header';

    protected static string $version = 'dev';

    public function configurePackage(Package $package): void
    {
        static::$version = InstalledVersions::getPrettyVersion('awcodes/filament-sticky-header');

        $package
            ->name(static::$name)
            ->hasAssets();
    }

    public function packageRegistered(): void
    {
        parent::packageRegistered();

        $this->app->singleton('sticky-header', fn (): StickyHeader => new StickyHeader());
    }

    /**
     * @return array
     */
    public function getStyles(): array
    {
        if (! app('sticky-header')->isCssDisabled()) {
            return [
                'plugin-sticky-header-' . static::$version => __DIR__ . '/../resources/dist/filament-sticky-header.css',
            ];
        }

        return [];
    }

    protected function getBeforeCoreScripts(): array
    {
        return [
            'plugin-sticky-header-' . static::$version => __DIR__ . '/../resources/dist/filament-sticky-header.js',
        ];
    }

    protected function getScriptData(): array
    {
        return [
            'stickyHeaderTheme' => app('sticky-header')->getTheme(),
            'stickyTopBar' => app('sticky-header')->isTopBarSticky(),
        ];
    }
}
