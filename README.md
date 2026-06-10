# Faker Africa 🌍

> **The open-source fake data library for African countries.**
> Built on top of [FakerPHP](https://fakerphp.org/), designed for Laravel, Symfony, and beyond.

[![Latest Version](https://img.shields.io/packagist/v/faker-africa/faker-africa.svg?style=flat-square)](https://packagist.org/packages/faker-africa/faker-africa)
[![PHP Version](https://img.shields.io/packagist/php-v/faker-africa/faker-africa.svg?style=flat-square)](https://packagist.org/packages/faker-africa/faker-africa)
[![GitHub Tests](https://img.shields.io/github/actions/workflow/status/faker-africa/faker-africa/ci.yml?label=tests&style=flat-square)](https://github.com/faker-africa/faker-africa/actions)
[![License: MIT](https://img.shields.io/badge/License-MIT-green.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/faker-africa/faker-africa.svg?style=flat-square)](https://packagist.org/packages/faker-africa/faker-africa)

---

## Why Faker Africa?

Standard Faker libraries generate American cities, generic Western names, and USD amounts.
African developers deserve better: **realistic local data** for testing, seeding, and prototyping.

**Faker Africa** fills that gap — one country at a time, built by and for African developers.

---

## Supported Countries

| Version | Countries |
|---------|-----------|
| **v1** (current) | 🇧🇯 Bénin |
| **v2** (planned) | 🇹🇬 Togo · 🇨🇮 Côte d'Ivoire · 🇸🇳 Sénégal |
| **v3** (planned) | 🇨🇲 Cameroun · 🇬🇭 Ghana · 🇳🇬 Nigeria · 🇿🇦 Afrique du Sud |

---

## Installation

```bash
composer require faker-africa/faker-africa
```

### Laravel (optional — auto-discovered)

No manual setup needed. Laravel will automatically register `FakerAfricaServiceProvider` via package auto-discovery.

To publish the config file:

```bash
php artisan vendor:publish --tag=faker-africa-config
```

---

## Quick Start

```php
use FakerAfrica\Core\FakerAfricaFactory;

$faker = FakerAfricaFactory::create('BJ'); // BJ = Bénin

// Identité
echo $faker->firstName();       // Adjovi
echo $faker->lastName();        // Amoussou
echo $faker->fullName();        // Adjovi Amoussou

// Géographie
echo $faker->city();            // Cotonou
echo $faker->department();      // Atlantique
echo $faker->address();         // Bloc 7, Lot 1234, Quartier Fidjrossè, Cotonou, Bénin

// Téléphonie
echo $faker->mtnPhoneNumber();     // +229 96 123456
echo $faker->moovPhoneNumber();    // +229 94 654321
echo $faker->celtiisPhoneNumber(); // +229 98 112233
echo $faker->phoneNumber();        // (any operator)

// Finance
echo $faker->amount();          // 125 500 FCFA
echo $faker->amountInt();       // 125500

// Immatriculation
echo $faker->licensePlate();    // AB 4567 RB

// Commerce local
echo $faker->market();                  // Marché Dantokpa
echo $faker->company();                 // Amoussou Technologies
echo $faker->companyWithLegalForm();    // Zinsou Commerce SARL

// Mobile Money
$tx = $faker->mobileMoney();
// [
//   'operator'         => 'MTN Mobile Money',
//   'sender_phone'     => '+229 96 123456',
//   'receiver_phone'   => '+229 97 654321',
//   'amount'           => 25000,
//   'amount_formatted' => '25 000 FCFA',
//   'fees'             => 250,
//   'transaction_id'   => 'AB123456CD78',
//   'timestamp'        => '2025-03-14 09:32:11',
//   'status'           => 'SUCCESS',
//   'service_code'     => '*880#',
// ]
```

---

## Laravel Database Factory Example

```php
// database/factories/UserFactory.php
use FakerAfrica\Core\FakerAfricaFactory;

class UserFactory extends Factory
{
    public function definition(): array
    {
        $faker = FakerAfricaFactory::create('BJ');

        return [
            'name'       => $faker->fullName(),
            'email'      => $this->faker->unique()->safeEmail(),
            'phone'      => $faker->mtnPhoneNumber(),
            'city'       => $faker->city(),
            'department' => $faker->department(),
            'address'    => $faker->address(),
        ];
    }
}
```

---

## Symfony Usage

```php
use FakerAfrica\Core\FakerAfricaFactory;

// In a fixture or test
$faker = FakerAfricaFactory::create('BJ');

$user = new User();
$user->setName($faker->fullName());
$user->setPhone($faker->moovPhoneNumber());
$user->setCity($faker->city());
```

---

## Community Extensions

You can register third-party or community providers at runtime:

```php
use FakerAfrica\Core\FakerAfricaFactory;

// Register a community-contributed provider
FakerAfricaFactory::extend('ML', \MyOrg\FakerMali\MaliProvider::class);

$faker = FakerAfricaFactory::create('ML');
echo $faker->city(); // Bamako
```

Or in Laravel, via `config/faker-africa.php`:

```php
'extensions' => [
    'ML' => \MyOrg\FakerMali\MaliProvider::class,
],
```

---

## Available Methods — Bénin (BJ)

| Method | Return type | Example |
|--------|-------------|---------|
| `firstName()` | `string` | `Adjovi` |
| `lastName()` | `string` | `Amoussou` |
| `fullName()` | `string` | `Adjovi Amoussou` |
| `city()` | `string` | `Cotonou` |
| `department()` | `string` | `Atlantique` |
| `address()` | `string` | `Bloc 3, Lot 421, Quartier Agla, Cotonou, Bénin` |
| `mtnPhoneNumber()` | `string` | `+229 96 781234` |
| `moovPhoneNumber()` | `string` | `+229 94 345678` |
| `celtiisPhoneNumber()` | `string` | `+229 98 112233` |
| `phoneNumber()` | `string` | (random operator) |
| `amount($min, $max)` | `string` | `125 500 FCFA` |
| `amountInt($min, $max)` | `int` | `125500` |
| `licensePlate()` | `string` | `AB 4567 RB` |
| `market()` | `string` | `Marché Dantokpa` |
| `company()` | `string` | `Zinsou Technologies` |
| `companyWithLegalForm()` | `string` | `Zinsou Technologies SARL` |
| `mobileMoney()` | `array` | (see Quick Start) |

---

## Running Tests

```bash
composer test                  # PHPUnit
composer test-coverage         # With HTML coverage report
composer analyse               # PHPStan (level 8)
composer cs-fix                # PHP CS Fixer
```

---

## Architecture

```
faker-africa/
├── src/
│   ├── Contracts/
│   │   ├── CountryProviderInterface.php   # Core interface
│   │   ├── DatasetInterface.php
│   │   └── MobileMoneyProviderInterface.php
│   ├── Core/
│   │   ├── BaseDataset.php                # Abstract dataset
│   │   ├── BaseProvider.php               # Abstract provider
│   │   └── FakerAfricaFactory.php         # Entry point
│   ├── Datasets/
│   │   └── Benin/
│   │       ├── FirstNamesDataset.php
│   │       ├── LastNamesDataset.php
│   │       ├── CitiesDataset.php
│   │       ├── DepartmentsDataset.php
│   │       ├── MarketsDataset.php
│   │       └── CompaniesDataset.php
│   ├── Providers/
│   │   └── Benin/
│   │       └── BeninProvider.php
│   └── Laravel/
│       └── FakerAfricaServiceProvider.php
├── tests/
│   └── Unit/
│       ├── Core/
│       ├── Datasets/Benin/
│       └── Providers/Benin/
├── config/
│   └── faker-africa.php
└── .github/
    └── workflows/ci.yml
```

---

## Contributing

We welcome contributions from everyone! Check out [CONTRIBUTING.md](CONTRIBUTING.md) to get started.

**Want to add your country?** Follow the guide in CONTRIBUTING.md — it takes less than an hour.

---

## Roadmap

See [CHANGELOG.md](CHANGELOG.md) for detailed version history.

### v1.0 — Bénin ✅
- First names, last names, full names
- Cities (all 77 communes), departments
- Addresses, markets, companies
- MTN / Moov / Celtiis phone numbers
- FCFA amounts, license plates
- Mobile Money transactions

### v2.0 — West Africa Expansion
- Togo (Lomé, Hausa/Ewe names, Flooz & T-Money)
- Côte d'Ivoire (Abidjan, Orange/MTN/Moov CI)
- Sénégal (Dakar, Wave, Orange Money/Free Money)

### v3.0 — Pan-African
- Cameroun (XAF, MTN/Orange CM)
- Ghana (GHS, MTN/Vodafone/AirtelTigo)
- Nigeria (NGN, MTN/Glo/Airtel/9mobile)
- Afrique du Sud (ZAR, Vodacom/MTN/Cell C)

---

## License

[MIT](LICENSE) — Free for personal and commercial use.

---

<p align="center">
  Made with ❤️ by African developers, for African developers.
</p>
