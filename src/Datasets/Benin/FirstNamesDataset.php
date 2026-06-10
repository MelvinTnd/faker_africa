<?php

declare(strict_types=1);

namespace FakerAfrica\Datasets\Benin;

use FakerAfrica\Core\BaseDataset;

/**
 * Benin first names dataset.
 * Covers Fon, Yoruba, Dendi, Bariba, Adja origins.
 */
class FirstNamesDataset extends BaseDataset
{
    protected array $data = [
        // Fon / Adja
        'Adjovi', 'Adjoa', 'Akossi', 'Akoua', 'Akpan', 'Alaba',
        'Amavi', 'Amédée', 'Amossou', 'Amoussou', 'Assouma', 'Atindé',
        'Ayéwa', 'Ayiha', 'Azande', 'Azonsi',
        // Yoruba
        'Adeola', 'Adewale', 'Adewumi', 'Akin', 'Babatunde', 'Biodun',
        'Bola', 'Chisom', 'Damilola', 'Emeka', 'Femi', 'Funmi',
        'Gbenga', 'Ibukun', 'Idowu', 'Kehinde', 'Kunle', 'Lanre',
        'Modupe', 'Niyi', 'Ola', 'Olubunmi', 'Seun', 'Tobi',
        // Bariba / Dendi / Northern
        'Adamou', 'Alassane', 'Aliou', 'Almoustapha',
        'Bouraïma', 'Daouda', 'Farou', 'Fousséni',
        'Hamidou', 'Ibrahim', 'Idrissou', 'Ismaïl',
        'Maïmouna', 'Mamoudou', 'Moussa', 'Nassif',
        'Oumarou', 'Seïdou', 'Souley', 'Yarou',
        // French / Christian influence
        'Achille', 'Béatrice', 'Blaise', 'Calixte', 'Céleste',
        'Chantal', 'Clémentine', 'Edwige', 'Euphrasie', 'Florent',
        'Gauthier', 'Ghislain', 'Honoré', 'Innocent', 'Joséphine',
        'Justin', 'Laurent', 'Léonce', 'Madeleine', 'Marcel',
        'Modeste', 'Nadège', 'Parfait', 'Pascal', 'Patrice',
        'Perpétue', 'Prudence', 'Rosalie', 'Serge', 'Stéphane',
        'Théodore', 'Victorine', 'Wilfried', 'Yvette', 'Zénon',
    ];
}
