<?php

namespace FmTod\IdeHelperActions;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use FmTod\IdeHelperActions\Commands\LaravelActionsIdeHelperCommand;

class LaravelActionsIdeHelperServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-actions-ide-helper')
            ->hasCommand(LaravelActionsIdeHelperCommand::class);
    }
}
