<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends AbstractController
{
    /**
     * @Route("/security", name="security")
     */
    public function index(): Response
    {
        return $this->render('security/index.html.twig', [
            'controller_name' => 'SecurityController',
        ]);
    }
    /**
     * @Route("/login",name="login")
     */
    public function login(Request $request ,AuthenticationUtils $authentication){
        // get the login error if there is one
        $error = $authentication->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authentication->getLastUsername();
        return $this->render('security/login.html.twig',[
            'last_username'=>$lastUsername,
            'error'=>$error,
        ]);
    }
}
