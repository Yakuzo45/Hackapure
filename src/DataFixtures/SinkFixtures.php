<?php

namespace App\DataFixtures;

use App\Entity\Install;
use App\Entity\Sink;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class SinkFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $install = new Install();
            $sink = new Sink();
            $sink->setType($faker->word);
            $sink->setInstall($install);
            $sink->setNumber($faker->randomDigit);
            $manager->persist();
        }
        $manager->flush();
    }
}
