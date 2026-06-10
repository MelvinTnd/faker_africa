# Faker Africa 🇧🇯🇹🇬🇨🇮🇸🇳

**The first African-focused fake data generator for PHP & Laravel.**

Faker Africa is a PHP library that extends FakerPHP with realistic African datasets — starting with **Bénin**, and expanding across Africa (Togo, Côte d'Ivoire, Sénégal, and more).

It helps developers build and test applications with **realistic local data instead of generic Western data**.

---

## 📦 Installation

```bash
composer require faker-africa/faker-africa:^0.1
```

---

## 🚀 Usage

```php
use Faker\Factory;
use FakerAfrica\Providers\BeninProvider;

$faker = Factory::create();
$faker->addProvider(new BeninProvider($faker));

// Generate data
echo $faker->beninFullName();   // Ahouansou Rodrigue
echo $faker->beninCity();       // Cotonou
echo $faker->mtnNumber();       // +229 01 97 45 23 18
echo $faker->xofAmount();       // 125000 XOF
```

---

## 🏗️ Laravel Setup

```php
use Faker\Factory;
use FakerAfrica\Providers\BeninProvider;

$faker = Factory::create();
$faker->addProvider(
    new FakerAfrica\Providers\BeninProvider($faker)
);
```

Auto-discovery is supported — no manual registration needed in Laravel.

---

## 🌍 Real World Example — Laravel Factory

```php
use Faker\Factory;
use FakerAfrica\Providers\BeninProvider;

$faker = Factory::create();
$faker->addProvider(new BeninProvider($faker));

// Example: user seeding
User::factory()->create([
    'name'    => $faker->beninFullName(),
    'phone'   => $faker->mtnNumber(),
    'city'    => $faker->beninCity(),
    'balance' => $faker->xofAmount(),
]);
```

---

## 📌 Example Output

```text
Ahouansou Rodrigue
Cotonou
+229 01 97 45 23 18
125000 XOF
```

---

## ✨ Features (v0.1 — Bénin)

* 🇧🇯 Benin realistic names (first & last names)
* 🏙️ Benin cities and departments
* 📞 MTN / Moov / Celtiis phone numbers format
* 🏠 Realistic Benin addresses
* 💰 XOF (FCFA) amount generator
* 🧑‍💼 Full name generator
* 📍 Localized data for African context

---

## 🏗️ Project Structure

```text
src/
 └── Providers/
      └── BeninProvider.php

data/
 └── benin/
      ├── first_names.php
      ├── last_names.php
      ├── cities.php
      └── departments.php
```

---

## 🌍 Roadmap

### v0.1 (current)
* 🇧🇯 Bénin support

### v0.2
* 🇹🇬 Togo support
* 🇨🇮 Côte d'Ivoire support

### v0.3
* 🇸🇳 Sénégal support
* Mobile Money improvements

### v1.0
* 🇨🇲 Cameroun
* 🇳🇬 Nigeria
* 🇬🇭 Ghana
* Full African coverage

---

## 🤝 Contributing

Contributions are welcome!

You can help by:

* Adding new countries
* Improving datasets
* Adding phone formats
* Fixing bugs
* Improving documentation

Please open a Pull Request or Issue.

---

## 🎯 Why Faker Africa?

Most fake data libraries are designed for Western countries.

Faker Africa brings:

* African names
* African phone formats
* African cities
* African financial context (XOF, Mobile Money)

Making it perfect for:

* Laravel applications
* API testing
* E-commerce platforms
* School projects
* Startup MVPs

---

## 📄 License

MIT License © Faker Africa Contributors

Built on top of [FakerPHP](https://fakerphp.org/).