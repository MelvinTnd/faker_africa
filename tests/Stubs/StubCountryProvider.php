<?php

declare(strict_types=1);

namespace FakerAfrica\Tests\Stubs;

use Faker\Generator;
use FakerAfrica\Core\BaseProvider;

/**
 * Stub provider used in FakerAfricaFactoryTest.
 * @internal
 */
final class StubCountryProvider extends BaseProvider
{
    public function getCountryCode(): string   { return 'ZZ'; }
    public function getCountryName(): string   { return 'Testland'; }
    public function getCurrencyCode(): string  { return 'XTS'; }
    public function getPhoneProviders(): array { return []; }
    public function firstName(): string        { return 'TestFirst'; }
    public function lastName(): string         { return 'TestLast'; }
    public function fullName(): string         { return 'TestFirst TestLast'; }
    public function city(): string             { return 'TestCity'; }
    public function department(): string       { return 'TestDept'; }
    public function address(): string          { return '1 Test St, Testland'; }
    public function phoneNumber(): string      { return '+000 00 000000'; }
    public function amount(): string           { return '0 XTS'; }
}
