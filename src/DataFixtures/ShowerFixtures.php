<?php

namespace App\DataFixtures;

use App\Entity\Shower;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class ShowerFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $shower = new Shower();
            $shower->setNumber($faker->randomDigit);
            $shower->setType($faker->word);
            $manager->persist($shower);
            $shower->setInstall($this->getReference('install_' . $i));
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            InstallFixtures::class];
    }
}
