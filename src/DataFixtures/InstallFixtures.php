<?php

namespace App\DataFixtures;

use App\Entity\AfterMeter;
use App\Entity\UnderSink;
use App\Entity\Bath;
use App\Entity\Install;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;

class InstallFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $install = new Install();
            $manager->persist($install);
            $this->addReference('install_', $install);
        }
        $manager->flush();

    }

    public function getDependencies()
    {
        return [
            AfterMeter::class,
            UnderSink::class,
            Bath::class
            ];
    }

}