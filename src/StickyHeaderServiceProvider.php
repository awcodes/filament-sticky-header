<?php

declare(strict_types=1);

namespace Awcodes\StickyHeader;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class StickyHeaderServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('awcodes-sticky-header');
    }

    public function packageRegistered(): void
    {
        parent::packageRegistered();
    }
}
