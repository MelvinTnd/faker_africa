<?php

declare(strict_types=1);

namespace FakerAfrica\Datasets\Benin;

use FakerAfrica\Core\BaseDataset;

/**
 * Benin cities dataset — all 77 communes + main localities.
 */
class CitiesDataset extends BaseDataset
{
    protected array $data = [
        // Littoral
        'Cotonou',
        // Atlantique
        'Abomey-Calavi', 'Allada', 'Kpomassè', 'Ouidah', 'Sô-Ava',
        'Toffo', 'Tori-Bossito', 'Zè',
        // Ouémé
        'Porto-Novo', 'Adjarra', 'Adjohoun', 'Akpro-Missérété',
        'Avrankou', 'Bonou', 'Dangbo', 'Missérété', 'Sèmè-Podji',
        // Plateau
        'Pobè', 'Adja-Ouèrè', 'Ifangni', 'Kétou', 'Sakété',
        // Mono
        'Lokossa', 'Athiémé', 'Bopa', 'Come', 'Grand-Popo', 'Houéyogbé',
        // Couffo
        'Aplahoué', 'Djakotomey', 'Dogbo', 'Klouékanmè', 'Lalo', 'Toviklin',
        // Zou (et Collines)
        'Abomey', 'Agbangnizoun', 'Bohicon', 'Covè', 'Djidja',
        'Ouinhi', 'Zakpota', 'Zangnanado', 'Zogbodomey',
        'Bantè', 'Dassa-Zoumè', 'Glazoué', 'Ouèssè', 'Savalou', 'Savè',
        // Borgou
        'Parakou', 'Bembèrèkè', 'Kalalé', 'N\'Dali', 'Nikki',
        'Pèrèrè', 'Sinendé', 'Tchaourou',
        // Alibori
        'Kandi', 'Banikoara', 'Gogounou', 'Karimama', 'Malanville', 'Ségbana',
        // Atacora
        'Natitingou', 'Boukoumbé', 'Cobly', 'Kérou', 'Kouandé',
        'Matéri', 'Pehunco', 'Tanguiéta', 'Toukountouna',
        // Donga
        'Djougou', 'Bassila', 'Copargo', 'Ouaké',
    ];
}
