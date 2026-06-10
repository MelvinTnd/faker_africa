<?php

declare(strict_types=1);

namespace FakerAfrica\Core;

use FakerAfrica\Contracts\DatasetInterface;

/**
 * Abstract BaseDataset
 *
 * Provides the default implementation of DatasetInterface.
 * Concrete datasets extend this class and define their $data array.
 */
abstract class BaseDataset implements DatasetInterface
{
    /** @var array<int|string, mixed> */
    protected array $data = [];

    /**
     * {@inheritdoc}
     */
    public function all(): array
    {
        return $this->data;
    }

    /**
     * {@inheritdoc}
     */
    public function random(): mixed
    {
        if (empty($this->data)) {
            throw new \RuntimeException(
                sprintf('Dataset "%s" is empty.', static::class)
            );
        }

        return $this->data[array_rand($this->data)];
    }

    /**
     * {@inheritdoc}
     */
    public function count(): int
    {
        return count($this->data);
    }
}
