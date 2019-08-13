<?php

namespace App\DataFixtures;

use App\Entity\Bath;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class BathFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $bath = new Bath();
            $bath->setNumber($faker->randomDigit);
            $manager->persist($bath);
            $this->addReference('bath_', $bath);
        }
        $manager->flush();
    }
}
