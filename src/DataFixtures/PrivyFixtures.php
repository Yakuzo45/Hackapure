<?php

namespace App\DataFixtures;

use App\Entity\Privy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class PrivyFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $privy = new Privy();
            $privy->setType($faker->word);
            $privy->setNumber($faker->randomDigit);
            $manager->persist($privy);
            $privy->setInstall($this->getReference('install_' . $i));
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            InstallFixtures::class];
    }
}
