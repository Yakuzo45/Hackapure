<?php

namespace App\DataFixtures;

use App\Entity\AfterMeter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class AfterMeterFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $aftermeter = new AfterMeter();
            $aftermeter->setMaterial($faker->word);
            $aftermeter->setDiameter($faker->randomDigit);
            $aftermeter->setScrewthread($faker->word);
            $aftermeter->setThread($faker->sentence(3, true));
            $aftermeter->setAccuracy(($faker->sentence(10, true)));
            $aftermeter->setPicture($faker->image());
            $manager->persist($aftermeter);
            $this->addReference('aftermeter_', $aftermeter);
        }
        $manager->flush();
    }
}
