<?php

namespace App\DataFixtures;

use App\Entity\Install;
use App\Entity\Shower;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;use Symfony\Component\DependencyInjection\Tests\Compiler\F;

class ShowerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $install = new Install();
            $shower = new Shower();
            $shower->setNumber($faker->randomDigit);
            $shower->setInstall($install);
            $shower->setType($faker->word);
            $manager->persist($shower);
        }
        $manager->flush();
    }
}
