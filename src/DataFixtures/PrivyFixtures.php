<?php

namespace App\DataFixtures;

use App\Entity\Privy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class PrivyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $privy = new Privy();
            $privy->setType($faker->word);
            $privy->setNumber($faker->randomDigit);
//            $privy->setInstall($faker->);
            $manager->persist($privy);
        }
        $manager->flush();
    }
}
