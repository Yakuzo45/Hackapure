<?php

namespace App\DataFixtures;

use App\Entity\AfterMeter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class AfterMeterFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $aftermeter = new AfterMeter();
            $aftermeter->setMaterial($this->getReference('material_'.$i));
            $aftermeter->setDiameter($this->getReference('diameter_'.$i));
            $aftermeter->setScrewthread($faker->word);
            $aftermeter->setThread($faker->sentence(3, true));
            $aftermeter->setAccuracy(($faker->sentence(10, true)));
            $aftermeter->setPicture($faker->image());
            $manager->persist($aftermeter);
            $this->addReference('aftermeter_' . $i, $aftermeter);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return [
            MaterialFixtures::class,
            DiameterFixtures::class];
    }

}
