<?php

namespace App\DataFixtures;

use App\Entity\Civility;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CivilityFixtures extends Fixture
{
    const CIVILITIES = [
        ['Mme', 'Madame'],
        ['M.' ,'Monsieur'],
        ['Autre', 'Autre']
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CIVILITIES as $key =>$civilityType) {
            $civility = new Civility();
            $civility->setName($civilityType[1]);
            $civility->setShortName($civilityType[0]);
            $manager->persist($civility);
            $this->addReference('civility_' . $key, $civility);

        }
        $manager->flush();
    }
}
