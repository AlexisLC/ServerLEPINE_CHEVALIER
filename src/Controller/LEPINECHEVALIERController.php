<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;

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
     * @Route("/srv/login", name="login")
     */
    public function login(Request $request, EntityManagerInterface $manager): Response
    {
        $login = $request->get("login");
        $password = $request->request->get("password");
        if ($login=="root" && $password="toor")
            $message = "connexion réussite";
        else
        $message = "erreur d'identification";
        return $this->render('lepinechevalier/login.html.twig',
        [
            'login' =>$login,
            'password' =>$password,
            'message'=> $message,
        ]);
    }
}
