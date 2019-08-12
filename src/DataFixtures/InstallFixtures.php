<?php

namespace App\DataFixtures;

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
            $install->setUndersink($this->getReference('undersink_0'));
            $install->setAftermeter($this->getReference('aftermeter_0'));
            $install->setBath($this->getReference('bath_0'));
            $install->setIdProspect('IdProspect_0');
        }
    }
    public function getDependencies()
    {
        return [InstallFixtures::class];
    }

}