<?php

declare(strict_types=1);

namespace FakerAfrica\Tests\Unit\Providers\Benin;

use PHPUnit\Framework\TestCase;
use FakerAfrica\Core\FakerAfricaFactory;
use FakerAfrica\Providers\Benin\BeninProvider;
use Faker\Generator;

/**
 * @covers \FakerAfrica\Providers\Benin\BeninProvider
 */
class BeninProviderTest extends TestCase
{
    private Generator $faker;

    protected function setUp(): void
    {
        $this->faker = FakerAfricaFactory::create('BJ');
    }

    // ─── Factory ─────────────────────────────────────────────────────────────

    public function test_factory_returns_faker_generator(): void
    {
        $this->assertInstanceOf(Generator::class, $this->faker);
    }

    public function test_factory_throws_for_unsupported_country(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        FakerAfricaFactory::create('XX');
    }

    // ─── Identité ────────────────────────────────────────────────────────────

    public function test_first_name_is_non_empty_string(): void
    {
        $this->assertIsString($this->faker->firstName());
        $this->assertNotEmpty($this->faker->firstName());
    }

    public function test_last_name_is_non_empty_string(): void
    {
        $this->assertIsString($this->faker->lastName());
        $this->assertNotEmpty($this->faker->lastName());
    }

    public function test_full_name_contains_space(): void
    {
        $fullName = $this->faker->fullName();
        $this->assertStringContainsString(' ', $fullName);
    }

    public function test_full_name_has_two_parts(): void
    {
        $parts = explode(' ', $this->faker->fullName());
        $this->assertGreaterThanOrEqual(2, count($parts));
    }

    // ─── Géographie ──────────────────────────────────────────────────────────

    public function test_city_is_string(): void
    {
        $this->assertIsString($this->faker->city());
    }

    public function test_city_is_not_empty(): void
    {
        $this->assertNotEmpty($this->faker->city());
    }

    public function test_department_is_among_twelve(): void
    {
        $departments = [
            'Alibori', 'Atacora', 'Atlantique', 'Borgou', 'Collines',
            'Couffo', 'Donga', 'Littoral', 'Mono', 'Ouémé', 'Plateau', 'Zou',
        ];
        $this->assertContains($this->faker->department(), $departments);
    }

    public function test_address_contains_benin(): void
    {
        $this->assertStringContainsString('Bénin', $this->faker->address());
    }

    public function test_address_contains_quartier(): void
    {
        $this->assertStringContainsString('Quartier', $this->faker->address());
    }

    // ─── Téléphonie ──────────────────────────────────────────────────────────

    /**
     * @dataProvider phoneMethodProvider
     */
    public function test_phone_starts_with_country_code(string $method): void
    {
        $this->assertStringStartsWith('+229', $this->faker->$method());
    }

    public function test_mtn_phone_has_correct_prefix(): void
    {
        $phone = $this->faker->mtnPhoneNumber();
        // Remove "+229 " and check first two digits
        $digits = str_replace(['+229 ', ' '], '', $phone);
        $prefix = substr($digits, 0, 2);
        $this->assertContains($prefix, ['96', '97', '66', '67']);
    }

    public function test_moov_phone_has_correct_prefix(): void
    {
        $phone  = $this->faker->moovPhoneNumber();
        $digits = str_replace(['+229 ', ' '], '', $phone);
        $prefix = substr($digits, 0, 2);
        $this->assertContains($prefix, ['94', '95', '64', '65']);
    }

    public function test_celtiis_phone_has_correct_prefix(): void
    {
        $phone  = $this->faker->celtiisPhoneNumber();
        $digits = str_replace(['+229 ', ' '], '', $phone);
        $prefix = substr($digits, 0, 2);
        $this->assertContains($prefix, ['98', '68', '69']);
    }

    /** @return array<string, array{string}> */
    public static function phoneMethodProvider(): array
    {
        return [
            'mtn'     => ['mtnPhoneNumber'],
            'moov'    => ['moovPhoneNumber'],
            'celtiis' => ['celtiisPhoneNumber'],
            'any'     => ['phoneNumber'],
        ];
    }

    // ─── Finance ─────────────────────────────────────────────────────────────

    public function test_amount_contains_fcfa(): void
    {
        $this->assertStringContainsString('FCFA', $this->faker->amount());
    }

    public function test_amount_is_multiple_of_five(): void
    {
        $intValue = $this->faker->amountInt();
        $this->assertSame(0, $intValue % 5);
    }

    public function test_amount_respects_min_max(): void
    {
        $amount = $this->faker->amountInt(1000, 10000);
        $this->assertGreaterThanOrEqual(1000, $amount);
        $this->assertLessThanOrEqual(10000, $amount);
    }

    // ─── Immatriculation ─────────────────────────────────────────────────────

    public function test_license_plate_matches_format(): void
    {
        $plate = $this->faker->licensePlate();
        // e.g. "AB 1234 RB"
        $this->assertMatchesRegularExpression('/^[A-Z]{2} \d{4} [A-Z]{2,3}$/', $plate);
    }

    // ─── Commerce local ──────────────────────────────────────────────────────

    public function test_market_is_non_empty(): void
    {
        $this->assertNotEmpty($this->faker->market());
    }

    public function test_market_contains_marche_keyword(): void
    {
        $this->assertStringContainsString('Marché', $this->faker->market());
    }

    public function test_company_is_non_empty(): void
    {
        $this->assertNotEmpty($this->faker->company());
    }

    public function test_company_with_legal_form_contains_legal_suffix(): void
    {
        $legalForms  = ['SARL', 'SA', 'GIE', 'ETS', 'Entreprise', 'Groupe', 'Holding', 'SAS', 'SASU'];
        $companyName = $this->faker->companyWithLegalForm();

        $found = false;
        foreach ($legalForms as $form) {
            if (str_contains($companyName, $form)) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, "Expected company name to contain a legal form: {$companyName}");
    }

    // ─── Mobile Money ────────────────────────────────────────────────────────

    public function test_mobile_money_has_required_keys(): void
    {
        $tx = $this->faker->mobileMoney();

        foreach ([
            'operator', 'sender_phone', 'receiver_phone',
            'amount', 'amount_formatted', 'fees',
            'transaction_id', 'timestamp', 'status', 'service_code',
        ] as $key) {
            $this->assertArrayHasKey($key, $tx, "Missing key: {$key}");
        }
    }

    public function test_mobile_money_status_is_valid(): void
    {
        $validStatuses = ['SUCCESS', 'PENDING', 'FAILED'];
        $this->assertContains($this->faker->mobileMoney()['status'], $validStatuses);
    }

    public function test_mobile_money_amount_is_positive(): void
    {
        $this->assertGreaterThan(0, $this->faker->mobileMoney()['amount']);
    }

    public function test_mobile_money_fees_is_non_negative(): void
    {
        $this->assertGreaterThanOrEqual(0, $this->faker->mobileMoney()['fees']);
    }

    public function test_mobile_money_timestamp_is_valid_date(): void
    {
        $timestamp = $this->faker->mobileMoney()['timestamp'];
        $this->assertNotFalse(\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', $timestamp));
    }

    // ─── Country meta ────────────────────────────────────────────────────────

    public function test_country_code_is_bj(): void
    {
        /** @var BeninProvider $provider */
        $provider = null;
        foreach ($this->faker->getProviders() as $p) {
            if ($p instanceof BeninProvider) { $provider = $p; break; }
        }
        $this->assertNotNull($provider);
        $this->assertSame('BJ', $provider->getCountryCode());
    }

    public function test_currency_code_is_xof(): void
    {
        /** @var BeninProvider $provider */
        $provider = null;
        foreach ($this->faker->getProviders() as $p) {
            if ($p instanceof BeninProvider) { $provider = $p; break; }
        }
        $this->assertNotNull($provider);
        $this->assertSame('XOF', $provider->getCurrencyCode());
    }
}
