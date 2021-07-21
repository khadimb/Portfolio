<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{   
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setFirstname('Khadim');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setEmail('khadim@admin.com');
        $admin->setPassword($this->passwordEncoder->encodePassword(
            $admin,
            'khadim'
        ));
        $manager->persist($admin);

        $manager->flush();
    }
}
