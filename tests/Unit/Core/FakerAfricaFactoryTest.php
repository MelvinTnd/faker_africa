<?php

declare(strict_types=1);

namespace FakerAfrica\Tests\Unit\Core;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use FakerAfrica\Core\FakerAfricaFactory;
use FakerAfrica\Providers\Benin\BeninProvider;
use FakerAfrica\Tests\Stubs\StubCountryProvider;

#[CoversClass(FakerAfricaFactory::class)]
class FakerAfricaFactoryTest extends TestCase
{
    public function test_supported_countries_include_bj(): void
    {
        $this->assertContains('BJ', FakerAfricaFactory::supportedCountries());
    }

    public function test_create_bj_returns_generator_with_benin_provider(): void
    {
        $faker = FakerAfricaFactory::create('BJ');
        $found = false;
        foreach ($faker->getProviders() as $provider) {
            if ($provider instanceof BeninProvider) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, 'BeninProvider not registered on the generator.');
    }

    public function test_create_throws_for_unsupported_country(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        FakerAfricaFactory::create('XX');
    }

    public function test_extend_registers_custom_provider(): void
    {
        FakerAfricaFactory::extend('ZZ', StubCountryProvider::class);
        $this->assertContains('ZZ', FakerAfricaFactory::supportedCountries());
    }

    public function test_extend_creates_working_generator(): void
    {
        FakerAfricaFactory::extend('ZZ', StubCountryProvider::class);
        $faker = FakerAfricaFactory::create('ZZ');
        $found = false;
        foreach ($faker->getProviders() as $provider) {
            if ($provider instanceof StubCountryProvider) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, 'StubCountryProvider not found on generator.');
    }

    public function test_extend_throws_if_class_not_found(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        FakerAfricaFactory::extend('XY', 'NonExistentClass\\Provider');
    }
}
