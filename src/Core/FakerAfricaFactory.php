<?php

declare(strict_types=1);

namespace FakerAfrica\Core;

use Faker\Generator;

/**
 * FakerAfricaFactory
 *
 * Entry point: creates a Faker\Generator pre-loaded with the
 * provider for the requested country.
 *
 * Usage:
 *   $faker = FakerAfricaFactory::create('BJ');
 *   echo $faker->firstName();   // Joe
 *   echo $faker->city();        // Cotonou
 */
class FakerAfricaFactory
{
    /**
     * Map of country ISO codes to their provider class.
     *
     * @var array<string, string>
     */
    private static array $providerMap = [
        'BJ' => \FakerAfrica\Providers\Benin\BeninProvider::class,
        // v2
        // 'TG' => \FakerAfrica\Providers\Togo\TogoProvider::class,
        // 'CI' => \FakerAfrica\Providers\CoteDIvoire\CoteDIvoireProvider::class,
        // 'SN' => \FakerAfrica\Providers\Senegal\SenegalProvider::class,
        // v3
        // 'CM' => \FakerAfrica\Providers\Cameroon\CameroonProvider::class,
        // 'GH' => \FakerAfrica\Providers\Ghana\GhanaProvider::class,
        // 'NG' => \FakerAfrica\Providers\Nigeria\NigeriaProvider::class,
        // 'ZA' => \FakerAfrica\Providers\SouthAfrica\SouthAfricaProvider::class,
    ];

    /**
     * Create a Faker\Generator with the given country provider.
     *
     * @param string $countryCode ISO 3166-1 alpha-2 code (e.g. "BJ")
     * @throws \InvalidArgumentException if the country code is not supported
     */
    public static function create(string $countryCode): Generator
    {
        $countryCode = strtoupper($countryCode);

        if (! isset(self::$providerMap[$countryCode])) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Country "%s" is not supported yet. Supported: %s. '
                    . 'Consider contributing at https://github.com/faker-africa/faker-africa',
                    $countryCode,
                    implode(', ', array_keys(self::$providerMap))
                )
            );
        }

        $faker    = \Faker\Factory::create();
        $provider = new self::$providerMap[$countryCode]($faker);
        $faker->addProvider($provider);

        return $faker;
    }

    /**
     * Returns the list of supported country codes.
     *
     * @return string[]
     */
    public static function supportedCountries(): array
    {
        return array_keys(self::$providerMap);
    }

    /**
     * Register a community-contributed provider at runtime.
     *
     * @param string $countryCode ISO 3166-1 alpha-2 code
     * @param string $providerClass FQCN of the provider
     */
    public static function extend(string $countryCode, string $providerClass): void
    {
        if (! class_exists($providerClass)) {
            throw new \InvalidArgumentException(
                "Provider class \"{$providerClass}\" does not exist."
            );
        }

        self::$providerMap[strtoupper($countryCode)] = $providerClass;
    }
}
