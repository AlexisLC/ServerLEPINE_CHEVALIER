<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LEPINECHEVALIERController extends AbstractController
{
    /**
     * @Route("/lepine", name="lepine")
     */
    public function index(): Response
    {
        return $this->render('lepinechevalier/index.html.twig', [
            'controller_name' => 'LEPINECHEVALIERController',
        ]);
    }
    /**
     * @Route("/traitement", name="traitement")
     */
    public function traitement(): Response
    {
        return $this->render('lepinechevalier/traitement.html.twig', [
            'controller_name' => 'LEPINECHEVALIERController',
        ]);
    }
}
