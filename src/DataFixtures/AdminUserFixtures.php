<?php


namespace App\DataFixtures;

use App\Entity\AdminUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminUserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $admin = new AdminUser();
        $admin->setEmail('admin@aquapure.fr');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword('$argon2id$v=19$m=65536,t=4,p=1$dWJ/YiWZBtw4rgzTPMODww$gAVW2nPz7PWOKDK8yDIHybLKVd5/toogKxKPo9YZ4w8');
        $manager->persist($admin);
        $manager->flush();
    }
}