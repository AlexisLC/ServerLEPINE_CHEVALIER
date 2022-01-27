<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LEPINECHEVALIERController extends AbstractController
{
    /**
     * @Route("/l/e/p/i/n/e/c/h/e/v/a/l/i/e/r", name="l_e_p_i_n_e_c_h_e_v_a_l_i_e_r")
     */
    public function index(): Response
    {
        return $this->render('lepinechevalier/index.html.twig', [
            'controller_name' => 'LEPINECHEVALIERController',
        ]);
    }
}
