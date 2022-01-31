<?php

namespace Lahiru\ExchangeRatesLk;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Lahiru\ExchangeRatesLk\Commands\ExchangeRatesLkCommand;

class ExchangeRatesLkServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('exchange-rates-lk')
            ->hasConfigFile()
            ->hasViews();


    }
}
