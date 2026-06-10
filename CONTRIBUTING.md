# Contributing to Faker Africa 🌍

Thank you for considering a contribution! Faker Africa grows through the efforts of people across the continent and beyond.

## Ways to Contribute

- 🌍 **Add a new country provider**
- 📦 **Extend an existing dataset** (more names, cities, markets…)
- 🔌 **Integrate a new telecom operator**
- 🐛 **Fix a bug**
- 🧪 **Improve test coverage**
- 📝 **Improve documentation / translations**

---

## Development Setup

```bash
# 1. Fork and clone the repo
git clone https://github.com/YOUR_USERNAME/faker-africa.git
cd faker-africa

# 2. Install dependencies
composer install

# 3. Run tests
composer test

# 4. Run static analysis
composer analyse

# 5. Check code style
composer cs-fix
```

---

## Adding a New Country

### Step 1 — Create the provider class

```
src/Providers/{Country}/{Country}Provider.php
```

Your provider must extend `FakerAfrica\Core\BaseProvider` and implement `FakerAfrica\Contracts\CountryProviderInterface`.

### Step 2 — Create your datasets

```
src/Datasets/{Country}/FirstNamesDataset.php
src/Datasets/{Country}/LastNamesDataset.php
src/Datasets/{Country}/CitiesDataset.php
src/Datasets/{Country}/DepartmentsDataset.php
```

Each dataset extends `FakerAfrica\Core\BaseDataset`. Data must be **verified** (official government sources, Wikipedia, etc.).

### Step 3 — Register in the factory

Open `src/Core/FakerAfricaFactory.php` and add your country code:

```php
'TG' => \FakerAfrica\Providers\Togo\TogoProvider::class,
```

### Step 4 — Write tests

```
tests/Unit/Providers/{Country}/{Country}ProviderTest.php
tests/Unit/Datasets/{Country}/DatasetsTest.php
```

Run `composer test` — all tests must pass.

### Step 5 — Open a Pull Request

Use the PR template. Cite your data sources.

---

## Dataset Quality Standards

| Criterion          | Requirement              |
|--------------------|--------------------------|
| Source             | Official / Wikipedia     |
| Minimum entries    | ≥ 20 per dataset         |
| Encoding           | UTF-8 with accents       |
| Duplicates         | Not allowed              |
| Fictional names    | Avoid real living people |

---

## Code Style

We follow **PSR-12** + `declare(strict_types=1)`. Run `composer cs-fix` before committing.

## Commit Convention

```
feat(togo): add Togo provider with 5 datasets
fix(benin): correct Moov phone prefixes
docs(readme): add Senegal examples
test(benin): add licensePlate format test
```

---

## Community

- 💬 Discussions: [GitHub Discussions](https://github.com/faker-africa/faker-africa/discussions)
- 🐛 Bugs: [GitHub Issues](https://github.com/faker-africa/faker-africa/issues)

Thank you for making Faker Africa better! 🙏
