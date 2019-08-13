<?php

namespace App\DataFixtures;

use App\Entity\Civility;
use App\Entity\Prospect;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ProspectFixtures extends Fixture
{


    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 20; $i++) {
            $prospect = new Prospect();
            $prospect->setCity($faker->city);
            $key = $faker->numberBetween($min = 0, $max = 2);
            $prospect->setCivility($this->getReference('civility_'.$key));
            $prospect->setEmail($faker->email);
            $prospect->setFirstname($faker->firstName);
            $prospect->setLastname($faker->lastName);
            $prospect->setPhone($faker->phoneNumber);
            $prospect->setFullAddress($faker->address);
            $prospect->setStreet($faker->streetAddress);
            $prospect->setZipCode($faker->postcode);

            $manager->persist($prospect);
            $this->addReference('prospect_' .$i, $prospect);

        }
        $manager->flush();
    }
}
