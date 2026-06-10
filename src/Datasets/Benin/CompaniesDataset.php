<?php

declare(strict_types=1);

namespace FakerAfrica\Datasets\Benin;

use FakerAfrica\Core\BaseDataset;

/**
 * Fictitious local business names for Bénin.
 * Realistic suffixes: SARL, SA, GIE, Entreprise, Groupe…
 */
class CompaniesDataset extends BaseDataset
{
    /** @var array<int, string> Company name prefixes */
    private array $prefixes = [
        'Agossou', 'Ahounou', 'Akpaki', 'Alokè', 'Amoussou',
        'Assogba', 'Behanzin', 'Dantokpa', 'Danwè', 'Dossou',
        'Fanou', 'Gbaguidi', 'Glèlè', 'Hounnou', 'Kossou',
        'Loko', 'Mensah', 'Mèdégan', 'Soglo', 'Talon',
        'Vodounou', 'Zinsou', 'Zinzin', 'Bénin Top',
        'Atlantic', 'Golfe', 'Littoral', 'Cotonou',
    ];

    /** @var array<int, string> Business domain terms */
    private array $domains = [
        'Services', 'Commerce', 'Négoce', 'Import-Export',
        'Constructions', 'Industries', 'Logistique', 'Consulting',
        'Distribution', 'Technologies', 'Solutions', 'Agro',
        'Transport', 'Immobilier', 'Investissements', 'Digital',
    ];

    /** @var array<int, string> Legal forms */
    private array $legalForms = [
        'SARL', 'SA', 'GIE', 'ETS', 'Entreprise',
        'Groupe', 'Holding', 'SAS', 'SASU',
    ];

    public array $data = [];

    public function __construct()
    {
        // Build a wide cross-product of realistic company names
        foreach ($this->prefixes as $prefix) {
            foreach ($this->domains as $domain) {
                $this->data[] = "{$prefix} {$domain}";
            }
        }
    }

    /**
     * Generate a company name with an optional legal form suffix.
     */
    public function companyWithLegalForm(): string
    {
        $base = $this->random();
        $form = $this->legalForms[array_rand($this->legalForms)];

        return "{$base} {$form}";
    }
}
