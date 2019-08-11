<?php

namespace App\DataFixtures;

use App\Entity\Civility;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CivilityFixtures extends Fixture
{
    const CIVILITIES = [
        'Mme.' => 'Madame',
        'M.' => 'Monsieur',
        'Autre' => 'Autre'
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CIVILITIES as $civilityShortName => $civilityName) {
            $civility = new Civility();
            $civility->setName($civilityName);
            $civility->setShortName($civilityShortName);
            $manager->persist($civility);

        }
        $manager->flush();
    }
}
