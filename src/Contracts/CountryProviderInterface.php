<?php

declare(strict_types=1);

namespace FakerAfrica\Contracts;

/**
 * Interface CountryProviderInterface
 *
 * Every country provider must implement this interface,
 * ensuring a consistent API across all African locales.
 */
interface CountryProviderInterface
{
    /**
     * Returns the ISO 3166-1 alpha-2 country code (e.g. "BJ" for Bénin).
     */
    public function getCountryCode(): string;

    /**
     * Returns the country's full name (e.g. "Bénin").
     */
    public function getCountryName(): string;

    /**
     * Returns the currency code used in this country (e.g. "XOF").
     */
    public function getCurrencyCode(): string;

    /**
     * Returns a list of phone providers available in this country.
     *
     * @return string[]
     */
    public function getPhoneProviders(): array;

    /**
     * Generates a realistic first name.
     */
    public function firstName(): string;

    /**
     * Generates a realistic last name.
     */
    public function lastName(): string;

    /**
     * Generates a realistic full name.
     */
    public function fullName(): string;

    /**
     * Generates a realistic city name.
     */
    public function city(): string;

    /**
     * Generates a realistic administrative region / department.
     */
    public function department(): string;

    /**
     * Generates a realistic full street address.
     */
    public function address(): string;

    /**
     * Generates a realistic local phone number.
     */
    public function phoneNumber(): string;

    /**
     * Generates a realistic monetary amount in the local currency.
     */
    public function amount(): string;
}
