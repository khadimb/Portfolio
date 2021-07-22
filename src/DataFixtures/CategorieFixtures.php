<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategorieFixtures extends Fixture
{
    public const CATEGORIES = [
        ['Nom' => 'Site Vitrine'],
        ['Nom' => 'E-Commerce'],
        ['Nom' => 'Refonte de site'],
        ['Nom' => 'Création Site'],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $key => $data) {
            $categorie = new Categorie();
            $categorie->setNom($data['Nom']);
            $manager->persist($categorie);
            $this->addReference('categorie_' . $key, $categorie);
        }

        $manager->flush();
    }
}
