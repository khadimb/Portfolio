<?php

namespace App\DataFixtures;

use App\Entity\Projet;
use App\DataFixtures\CategorieFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProjetFixtures extends Fixture
{   
    public const PROJET = [
        [
            'Nom' => 'Ma Pizza',
            'Lien' =>'https://mapizza-distributeurs.com/',
            'photo' =>'https://mapizza-distributeurs.com/wp-content/uploads/2018/11/logo-xxl.png',
            'description' => 'M. Rousseau, gérant de la société PIZZACK, a fait appel à moi dans le but de créer un site vitrine permettant de situer ses distributeurs de pizzas sur Orléans et son agglomération ainsi que de présenter la carte des pizzas disponibles. Pour cela, j\'ai réalisé des photos 360° afin que les visiteurs puissent se rendre compte de la position exacte des distributeurs en les visionnant dans leurs environnements.'
        ],
        [
            'Nom' => 'Domaine Mugnier',
            'Lien' =>'http://mugnier.fr/',
            'photo' =>'http://mugnier.fr/wp-content/uploads/2017/04/LogoMugnier-trans-v2.png',
            'description' => 'M. Jacques Frédéric Mugnier, propriétaire et exploitant du Château de Chambolle Musigny, producteur historique de liqueurs et de vins sous les appellations “Chambolle Musigny” et “Nuits-Saint-Georges” a fait appel à moi afin de refondre son site internet, principalement car la précédente version ne disposait pas d’une version Responsive design. J\'ai ainsi remodelé le site pour une navigation simple et fluide avec une image “haut de gamme” afin de séduire sa clientèle internationale.'
        ],
        [
            'Nom' => 'Be Mind',
            'Lien' =>'https://bemind.fr/',
            'photo' =>'https://bemind.fr/wp-content/uploads/2020/07/bemind-noir-grand-marge-2.png',
            'description' => 'BeMind est une entreprise spécialisée dans le coaching sportif sur Orléans. Elle propose à la clientèle des prestations telles que le coaching bien-être féminin, la musculation, la préparation physique, la perte de poids ou le coaching séniors. Avec des méthodes efficaces et un suivi constant des clients, BeMind offre un véritable coaching de qualité.

            Le site créé par mes soins est un site vitrine basique présentant les services qu’elle propose.'
        ],
        [
            'Nom' => 'Association REV France',
            'Lien' =>'http://revfrance.org/',
            'photo' =>'http://revfrance.org/wp-content/uploads/2018/02/logo-rev-france-color.png',
            'description' => 'L’association REV France, réseau français sur l’entente de voix, a fait appel à moi afin de créer son site internet. Les différents objectifs étaient les suivants : galerie de médias tous supports, agenda des permanences et évènements, possibilité d’adhésion et de paiement pour les évènements en ligne via la solution Hello Asso.'
        ],
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::PROJET as $key => $data) {
            $projet = new Projet();
            $projet->setNom($data['Nom']);
            $projet->setLien($data['Lien']);
            $projet->setPhoto($data['photo']);
            $projet->setDescription($data['description']);
            $projet->setCategorie($this->getReference('categorie_' . rand(0, count(CategorieFixtures::CATEGORIES) - 1)));
            $manager->persist($projet);  
        }

        $manager->flush();
    }
}
