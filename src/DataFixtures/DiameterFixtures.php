<?php

namespace App\DataFixtures;

use App\Entity\Diameter;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class DiameterFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $diameter = new Diameter();
            $diameter->setDiameter($faker->word);
            $diameter->setMaterial($this->getReference('material_'.$i));
            $manager->persist($diameter);
            $this->addReference('diameter_' .$i, $diameter);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            MaterialFixtures::class];
    }
}
