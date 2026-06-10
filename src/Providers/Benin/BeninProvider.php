<?php

declare(strict_types=1);

namespace FakerAfrica\Providers\Benin;

use FakerAfrica\Core\BaseProvider;
use FakerAfrica\Datasets\Benin\FirstNamesDataset;
use FakerAfrica\Datasets\Benin\LastNamesDataset;
use FakerAfrica\Datasets\Benin\CitiesDataset;
use FakerAfrica\Datasets\Benin\DepartmentsDataset;
use FakerAfrica\Datasets\Benin\MarketsDataset;
use FakerAfrica\Datasets\Benin\CompaniesDataset;

/**
 * BeninProvider
 *
 * Main Faker provider for the Republic of Bénin.
 * Registered automatically via FakerAfricaFactory::create('BJ').
 *
 * Available methods:
 *   - firstName()
 *   - lastName()
 *   - fullName()
 *   - city()
 *   - department()
 *   - address()
 *   - mtnPhoneNumber()
 *   - moovPhoneNumber()
 *   - celtiisPhoneNumber()
 *   - phoneNumber()
 *   - amount($min, $max)
 *   - licensePlate()
 *   - market()
 *   - company()
 *   - companyWithLegalForm()
 *   - mobileMoney()
 */
class BeninProvider extends BaseProvider
{
    public function getCountryCode(): string  { return 'BJ'; }
    public function getCountryName(): string  { return 'Bénin'; }
    public function getCurrencyCode(): string { return 'XOF'; }

    public function getPhoneProviders(): array
    {
        return ['MTN Bénin', 'Moov Africa Bénin', 'Celtiis Bénin'];
    }

    // ─── Identité ────────────────────────────────────────────────────────────

    public function firstName(): string
    {
        return (new FirstNamesDataset())->random();
    }

    public function lastName(): string
    {
        return (new LastNamesDataset())->random();
    }

    public function fullName(): string
    {
        return $this->firstName() . ' ' . $this->lastName();
    }

    // ─── Géographie ──────────────────────────────────────────────────────────

    public function city(): string
    {
        return (new CitiesDataset())->random();
    }

    public function department(): string
    {
        return (new DepartmentsDataset())->random();
    }

    /**
     * Generates a realistic Beninese street address.
     * Format:  [Block] / [Lot], Quartier [QuartierName], [City]
     */
    public function address(): string
    {
        $block    = 'Bloc ' . $this->faker->numberBetween(1, 20) . ', Lot ' . $this->faker->numberBetween(100, 9999);
        $quartier = $this->randomElement([
            'Fidjrossè', 'Agla', 'Cadjèhoun', 'Akpakpa', 'Vedoko',
            'Gbèdjromèdji', 'Jéricho', 'Sainte-Rita', 'Zongo', 'Sikècodji',
            'Agontikon', 'Avotrou', 'Dantokpa', 'Orogun', 'Gbédji',
            'Houéyiho', 'Vèdoko', 'Mènontin', 'Dèkoungbé', 'Fifatin',
        ]);
        $city = $this->city();

        return "{$block}, Quartier {$quartier}, {$city}, Bénin";
    }

    // ─── Téléphonie ──────────────────────────────────────────────────────────

    /**
     * MTN Bénin prefixes: 96, 97, 66, 67
     */
    public function mtnPhoneNumber(): string
    {
        $prefix = $this->randomElement(['96', '97', '66', '67']);
        $suffix = $this->faker->numerify('######');
        return "+229 {$prefix} {$suffix}";
    }

    /**
     * Moov Africa Bénin prefixes: 94, 95, 64, 65
     */
    public function moovPhoneNumber(): string
    {
        $prefix = $this->randomElement(['94', '95', '64', '65']);
        $suffix = $this->faker->numerify('######');
        return "+229 {$prefix} {$suffix}";
    }

    /**
     * Celtiis Bénin prefixes: 98, 68, 69
     */
    public function celtiisPhoneNumber(): string
    {
        $prefix = $this->randomElement(['98', '68', '69']);
        $suffix = $this->faker->numerify('######');
        return "+229 {$prefix} {$suffix}";
    }

    /**
     * Random phone number from any Beninese operator.
     */
    public function phoneNumber(): string
    {
        $method = $this->randomElement([
            'mtnPhoneNumber',
            'moovPhoneNumber',
            'celtiisPhoneNumber',
        ]);

        return $this->$method();
    }

    // ─── Finance ─────────────────────────────────────────────────────────────

    /**
     * Generates a realistic FCFA amount.
     * Amounts are multiples of 5 to reflect real-world rounding.
     *
     * @param int $min Minimum amount (default 500 FCFA)
     * @param int $max Maximum amount (default 5_000_000 FCFA)
     */
    public function amount(int $min = 500, int $max = 5_000_000): string
    {
        $raw    = $this->faker->numberBetween($min / 5, $max / 5) * 5;
        $formatted = number_format($raw, 0, ',', ' ');
        return "{$formatted} FCFA";
    }

    /**
     * Raw integer amount without currency label.
     */
    public function amountInt(int $min = 500, int $max = 5_000_000): int
    {
        return $this->faker->numberBetween($min / 5, $max / 5) * 5;
    }

    // ─── Immatriculation ─────────────────────────────────────────────────────

    /**
     * Generates a realistic Beninese license plate.
     * Format: AB 1234 RB  (two letters, 4 digits, region code)
     */
    public function licensePlate(): string
    {
        $letters1 = $this->faker->lexify('??');
        $digits   = $this->faker->numerify('####');
        $region   = $this->randomElement([
            'RB', 'AT', 'AL', 'BG', 'CL', 'CF', 'DN', 'LT', 'MN', 'OU', 'PL', 'ZO',
        ]);

        return strtoupper("{$letters1} {$digits} {$region}");
    }

    // ─── Commerce local ──────────────────────────────────────────────────────

    public function market(): string
    {
        return (new MarketsDataset())->random();
    }

    public function company(): string
    {
        return (new CompaniesDataset())->random();
    }

    public function companyWithLegalForm(): string
    {
        return (new CompaniesDataset())->companyWithLegalForm();
    }

    // ─── Mobile Money ────────────────────────────────────────────────────────

    /**
     * Generate a full Mobile Money transaction record.
     *
     * @return array{
     *   operator: string,
     *   sender_phone: string,
     *   receiver_phone: string,
     *   amount: int,
     *   amount_formatted: string,
     *   fees: int,
     *   transaction_id: string,
     *   timestamp: string,
     *   status: string,
     *   service_code: string,
     * }
     */
    public function mobileMoney(): array
    {
        $operator = $this->randomElement([
            ['label' => 'MTN Mobile Money',       'code' => '*880#', 'phone' => 'mtnPhoneNumber'],
            ['label' => 'Moov Money',              'code' => '*155#', 'phone' => 'moovPhoneNumber'],
            ['label' => 'Celtiis Pay',             'code' => '*700#', 'phone' => 'celtiisPhoneNumber'],
        ]);

        $amount = $this->amountInt(200, 500_000);
        $fees   = (int) round($amount * 0.01);               // 1% fee as typical

        return [
            'operator'         => $operator['label'],
            'sender_phone'     => $this->{$operator['phone']}(),
            'receiver_phone'   => $this->{$operator['phone']}(),
            'amount'           => $amount,
            'amount_formatted' => number_format($amount, 0, ',', ' ') . ' FCFA',
            'fees'             => $fees,
            'transaction_id'   => strtoupper($this->faker->bothify('??######??##')),
            'timestamp'        => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d H:i:s'),
            'status'           => $this->randomElement(['SUCCESS', 'SUCCESS', 'SUCCESS', 'PENDING', 'FAILED']),
            'service_code'     => $operator['code'],
        ];
    }
}
