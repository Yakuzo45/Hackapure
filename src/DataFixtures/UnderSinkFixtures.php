<?php

namespace App\DataFixtures;

use App\Entity\UnderSink;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class UnderSinkFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $undersink = new UnderSink();
            $undersink->setMaterial($faker->word);
            $undersink->setDiameter($faker->randomDigit);
            $undersink->setScrewthread($faker->word);
            $undersink->setThread($faker->sentence(3, true));
            $undersink->setAccuracy($faker->sentence(10, true));
            $undersink->setPicture($faker->image());
            $manager->persist($undersink);
            $this->addReference('undersink_' . $i, $undersink);
        }
        $manager->flush();
    }
}
