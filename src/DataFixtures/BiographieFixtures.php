<?php

namespace App\DataFixtures;

use App\Entity\Biographie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BiographieFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $bio = new Biographie();
        $bio->setDescription('Depuis toujours je suis passionné par les nouvelles technologies. Après avoir passé 10 ans dans la téléphonie et l’informatique, j’ai décidé d’intégrer la Wild code school pour devenir Développeur Web.
        Mes qualités : à l’écoute, patient, rigoureux, organisé, autonome, curieux...');
        $bio->setPhoto('https://bit.ly/3rt3RId');
        $manager->persist($bio);

        $manager->flush();
    }
}
