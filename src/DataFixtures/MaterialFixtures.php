<?php

namespace App\DataFixtures;

use App\Entity\Material;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class MaterialFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $material = new Material();
            $material->setMaterials($faker->word);
            $manager->persist($material);
            $this->addReference('material_' .$i, $material);
        }
        $manager->flush();
    }
}
