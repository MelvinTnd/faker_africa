<?php

declare(strict_types=1);

namespace FakerAfrica\Tests\Unit\Datasets\Benin;

use PHPUnit\Framework\TestCase;
use FakerAfrica\Datasets\Benin\FirstNamesDataset;
use FakerAfrica\Datasets\Benin\LastNamesDataset;
use FakerAfrica\Datasets\Benin\CitiesDataset;
use FakerAfrica\Datasets\Benin\DepartmentsDataset;
use FakerAfrica\Datasets\Benin\MarketsDataset;
use FakerAfrica\Datasets\Benin\CompaniesDataset;

/**
 * @covers \FakerAfrica\Core\BaseDataset
 */
class DatasetsTest extends TestCase
{
    public function test_first_names_dataset_has_entries(): void
    {
        $ds = new FirstNamesDataset();
        $this->assertGreaterThan(10, $ds->count());
    }

    public function test_first_names_random_is_string(): void
    {
        $this->assertIsString((new FirstNamesDataset())->random());
    }

    public function test_last_names_dataset_has_entries(): void
    {
        $ds = new LastNamesDataset();
        $this->assertGreaterThan(10, $ds->count());
    }

    public function test_cities_dataset_has_all_communes(): void
    {
        $ds = new CitiesDataset();
        $this->assertGreaterThanOrEqual(77, $ds->count());
    }

    public function test_cities_contains_cotonou(): void
    {
        $this->assertContains('Cotonou', (new CitiesDataset())->all());
    }

    public function test_departments_count_is_twelve(): void
    {
        $this->assertSame(12, (new DepartmentsDataset())->count());
    }

    public function test_markets_are_non_empty(): void
    {
        $ds = new MarketsDataset();
        $this->assertGreaterThan(5, $ds->count());
    }

    public function test_companies_dataset_generates_correctly(): void
    {
        $ds = new CompaniesDataset();
        $this->assertGreaterThan(10, $ds->count());
        $this->assertIsString($ds->random());
    }

    public function test_companies_legal_form_contains_suffix(): void
    {
        $result = (new CompaniesDataset())->companyWithLegalForm();
        $this->assertIsString($result);
        $this->assertNotEmpty($result);
    }

    public function test_empty_dataset_throws_on_random(): void
    {
        $ds = new class extends \FakerAfrica\Core\BaseDataset {
            protected array $data = [];
        };

        $this->expectException(\RuntimeException::class);
        $ds->random();
    }
}
