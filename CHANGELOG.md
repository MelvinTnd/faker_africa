# Changelog

All notable changes to Faker Africa are documented in this file.
This project adheres to [Semantic Versioning](https://semver.org/lang/fr/).

---

## [Unreleased]

---

## [1.0.0] — 2025-06-10

### Added — Bénin (BJ) 🇧🇯

#### Core Architecture
- `FakerAfricaFactory::create('BJ')` — entry point compatible with all frameworks
- `FakerAfricaFactory::extend()` — runtime registration for community providers
- `BaseProvider` — abstract parent for all country providers
- `BaseDataset` — abstract parent for all datasets
- `CountryProviderInterface` — standardized API contract for all countries
- `DatasetInterface` — standardized data access contract
- `MobileMoneyProviderInterface` — contract for MobileMoney generators
- `FakerAfricaServiceProvider` — Laravel auto-discovery integration

#### Providers — Bénin
- `firstName()` — 70+ authentic Beninese first names (Fon, Yoruba, Bariba, Dendi, French influence)
- `lastName()` — 70+ authentic Beninese family names
- `fullName()` — combined full name
- `city()` — all 77 communes of Bénin
- `department()` — all 12 departments
- `address()` — realistic addresses with block/lot/quartier/city format
- `mtnPhoneNumber()` — MTN Bénin (prefixes 96, 97, 66, 67) + country code +229
- `moovPhoneNumber()` — Moov Africa Bénin (prefixes 94, 95, 64, 65)
- `celtiisPhoneNumber()` — Celtiis Bénin (prefixes 98, 68, 69)
- `phoneNumber()` — random operator
- `amount($min, $max)` — FCFA amounts, multiples of 5
- `amountInt($min, $max)` — raw integer FCFA amount
- `licensePlate()` — format `XX 9999 RB` with real region codes
- `market()` — 24 famous Beninese markets including Dantokpa
- `company()` — fictitious company names (120+ combinations)
- `companyWithLegalForm()` — with SARL / SA / GIE / ETS suffix
- `mobileMoney()` — complete transaction record (MTN MoMo / Moov Money / Celtiis Pay)

#### Testing
- 30+ PHPUnit tests with full coverage of all methods
- Dataset integrity tests
- Factory unit tests including extension mechanism
- PHP 8.1 / 8.2 / 8.3 compatibility matrix

#### DevOps
- GitHub Actions CI (3-version PHP matrix)
- PHPStan level 8 configuration
- PHP CS Fixer (PSR-12 + strict types)
- PR template and Contributor guide

---

## [2.0.0] — Planned Q3 2025

### Planned — Togo 🇹🇬
- Ewe / Kabyé / Kotokoli names
- Cities (Lomé, Kpalimé, Sokodé…)
- Prefectures
- Togocel / Moov Togo phones
- Flooz / T-Money mobile money

### Planned — Côte d'Ivoire 🇨🇮
- Baoulé / Bété / Dioula names
- Cities (Abidjan, Bouaké, Yamoussoukro…)
- Departments / Districts
- MTN CI / Orange CI / Moov CI
- Orange Money / MTN MoMo / Wave CI

### Planned — Sénégal 🇸🇳
- Wolof / Serer / Pulaar / Diola names
- Cities (Dakar, Thiès, Saint-Louis…)
- Regions / Departments
- Orange SN / Free / Expresso
- Orange Money / Wave / Free Money

---

## [3.0.0] — Planned Q1 2026

### Planned — Cameroun 🇨🇲
- XAF currency, Bamiléké / Beti / Fulani names
- MTN CM / Orange CM

### Planned — Ghana 🇬🇭
- GHS currency, Akan / Ewe / Dagbani names
- MTN GH / Vodafone / AirtelTigo
- Mobile Money (MoMo / VFCash)

### Planned — Nigeria 🇳🇬
- NGN currency, Yoruba / Igbo / Hausa names
- MTN NG / Glo / Airtel / 9mobile
- OPay / PalmPay / Flutterwave

### Planned — Afrique du Sud 🇿🇦
- ZAR currency, Zulu / Xhosa / Sotho names
- Vodacom / MTN ZA / Cell C / Telkom

---

[Unreleased]: https://github.com/faker-africa/faker-africa/compare/v1.0.0...HEAD
[1.0.0]: https://github.com/faker-africa/faker-africa/releases/tag/v1.0.0
