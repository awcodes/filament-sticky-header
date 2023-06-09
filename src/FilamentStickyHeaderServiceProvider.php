<?php

namespace FilamentStickyHeader;

use Composer\InstalledVersions;
use Filament\Facades\Filament;
use Filament\PluginServiceProvider;
use Illuminate\Support\HtmlString;
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
        if (app('sticky-header')->shouldLoadAssets()) {
            return [
                'plugin-sticky-header-' . static::$version => __DIR__ . '/../resources/dist/filament-sticky-header.css',
            ];
        }

        return [];
    }

    protected function getBeforeCoreScripts(): array
    {
        if (app('sticky-header')->shouldLoadAssets()) {
            return [
                'plugin-sticky-header-' . static::$version => __DIR__ . '/../resources/dist/filament-sticky-header.js',
            ];
        }

        return [];
    }

    protected function getScriptData(): array
    {
        return [
            'stickyIsFloating' => app('sticky-header')->isFloating(),
            'stickyTopBar' => app('sticky-header')->isTopBarSticky(),
            'stickyColors' => app('sticky-header')->getColors(),
            'stickyOpacity' => app('sticky-header')->getOpacity(),
        ];
    }
}
