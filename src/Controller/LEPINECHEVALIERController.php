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
     * @Route("/newuser", name="newuser")
     */
    public function newuser(): Response
    {
        return $this->render('lepinechevalier/newuser.html.twig', [
            'controller_name' => 'LEPINECHEVALIERController',
           
        ]);
    }
    


    /**
    * @Route("/creeruti", name="creeruti")
    */
    public function creeruti(Request $request, EntityManagerInterface $manager): Response
    { 
        $login = $request->get("pseudo");
        $password = $request->request->get("pass");
        $password=password_hash($password, PASSWORD_DEFAULT);

        $monUtilisateur = new Utilisateur ();
        $monUtilisateur -> setLogin($login);
        $monUtilisateur -> setPassword($password);
        $monUtilisateur -> setNom($login);
        $manager -> persist($monUtilisateur);

        $manager -> flush ();

        return $this->redirectToRoute ('newuser');
        
    }
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, EntityManagerInterface $manager): Response
    {
        $login = $request->get("pseudo");
        $password = $request->request->get("pass");
    
        $reponse = $manager -> getRepository(Utilisateur :: class) -> findOneBy([ 'login' => $login]);
        if($reponse==NULL)
            $message = 'Utilisateur inconnu';
        else
            $hash=($reponse ->getPassword());
            if (password_verify($password, $hash))
                $message = "connexion réussite";    
            else
             $message = "erreur de mot de passe";
        return $this->render('lepinechevalier/login.html.twig',
        [
            'login' =>$login,
            'password' =>$password,
            'message'=> $message,
        ]);
    }
}