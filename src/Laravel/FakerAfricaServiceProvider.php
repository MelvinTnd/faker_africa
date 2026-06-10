<?php

declare(strict_types=1);

namespace FakerAfrica\Laravel;

use Illuminate\Support\ServiceProvider;
use FakerAfrica\Core\FakerAfricaFactory;

/**
 * FakerAfricaServiceProvider
 *
 * Auto-registers with Laravel via package discovery.
 * After installing the package, you can resolve faker instances via:
 *
 *   app('faker.africa.BJ')   // Bénin
 *
 * Or use the FakerAfricaFactory directly:
 *   FakerAfricaFactory::create('BJ')
 */
class FakerAfricaServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Publish configuration
        $this->mergeConfigFrom(__DIR__ . '/../../config/faker-africa.php', 'faker-africa');

        // Bind each supported country to the service container
        foreach (FakerAfricaFactory::supportedCountries() as $code) {
            $this->app->bind("faker.africa.{$code}", function () use ($code) {
                return FakerAfricaFactory::create($code);
            });
        }
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../config/faker-africa.php' => config_path('faker-africa.php'),
            ], 'faker-africa-config');
        }
    }
}
