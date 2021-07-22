<?php

namespace App\Controller;

use App\Repository\ProjetRepository;
use App\Repository\BiographieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/", name="portfolio")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="_accueil")
     */
    public function index(ProjetRepository $projetRepository, BiographieRepository $biographieRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'projets' => $projetRepository->findAll(),
            'biographies' => $biographieRepository->findAll(),
            ]);
    }
}
