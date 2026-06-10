<?php

declare(strict_types=1);

namespace FakerAfrica\Contracts;

/**
 * Interface DatasetInterface
 *
 * Every dataset class must expose its data through this interface.
 */
interface DatasetInterface
{
    /**
     * Returns all entries in the dataset.
     *
     * @return array<int|string, mixed>
     */
    public function all(): array;

    /**
     * Returns a single random entry from the dataset.
     */
    public function random(): mixed;

    /**
     * Returns the number of entries.
     */
    public function count(): int;
}
