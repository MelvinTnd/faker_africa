<?php

declare(strict_types=1);

namespace FakerAfrica\Core;

use Faker\Generator;
use FakerAfrica\Contracts\CountryProviderInterface;

/**
 * Abstract BaseProvider
 *
 * All country-specific Faker providers extend this class.
 * It binds to a Faker\Generator instance so all standard Faker
 * methods remain available in sub-providers.
 */
abstract class BaseProvider implements CountryProviderInterface
{
    public function __construct(protected Generator $faker)
    {
    }

    /**
     * Picks a random element from an array.
     *
     * @template T
     * @param  array<int, T> $array
     * @return T
     */
    protected function randomElement(array $array): mixed
    {
        if (empty($array)) {
            throw new \InvalidArgumentException('Cannot pick from an empty array.');
        }

        return $array[array_rand($array)];
    }

    /**
     * Picks N unique random elements from an array.
     *
     * @template T
     * @param  array<int, T> $array
     * @return array<int, T>
     */
    protected function randomElements(array $array, int $count = 1): array
    {
        $keys = array_rand($array, min($count, count($array)));

        if (! is_array($keys)) {
            $keys = [$keys];
        }

        return array_map(fn($k) => $array[$k], $keys);
    }
}
