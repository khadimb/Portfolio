<?php

namespace App\Controller;

use App\Entity\Biographie;
use App\Form\BiographieType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BioAdminController extends AbstractController
{
    /**
     * @Route("/bio", name="bio")
     * @isGranted("ROLE_ADMIN")
     */
    public function index(Request $request): Response
    {   $editBio = new Biographie();
        $form = $this->createForm(BiographieType::class, $editBio);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/edit_bio.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
