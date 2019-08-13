<?php

namespace App\DataFixtures;

use App\Entity\Sink;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class SinkFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $sink = new Sink();
            $sink->setType($faker->word);
            $sink->setNumber($faker->randomDigit);
            $manager->persist();
            $sink->setInstall($this->getReference('install_' . $i));
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            InstallFixtures::class];
    }
}
