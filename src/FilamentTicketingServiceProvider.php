<?php

namespace Sgcomptech\FilamentTicketing;

use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentTicketingServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-ticketing';

    public function boot()
    {
        parent::boot();
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name(static::$name)
            ->hasMigrations(['create_tickets_table', 'create_comments_table'])
            ->hasViews(static::$name)
            ->hasConfigFile(static::$name)
            ->hasTranslations();
    }

    protected function getResources(): array
    {
        return [config('filament-ticketing.ticket-resource')];
    }
}
