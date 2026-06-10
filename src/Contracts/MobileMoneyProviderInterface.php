<?php

declare(strict_types=1);

namespace FakerAfrica\Contracts;

/**
 * Interface MobileMoneyProviderInterface
 *
 * Defines the contract for Mobile Money data generators.
 * Implement this per telecom operator.
 */
interface MobileMoneyProviderInterface
{
    /**
     * Returns the operator name (e.g. "MTN Mobile Money").
     */
    public function getOperatorName(): string;

    /**
     * Returns the short service code (e.g. "*880#").
     */
    public function getServiceCode(): string;

    /**
     * Generates a valid phone number for this operator.
     */
    public function phoneNumber(): string;

    /**
     * Generates a realistic Mobile Money transaction ID.
     */
    public function transactionId(): string;

    /**
     * Generates a realistic transaction amount.
     */
    public function transactionAmount(): int;

    /**
     * Generates a full Mobile Money transaction record.
     *
     * @return array<string, mixed>
     */
    public function transaction(): array;
}
