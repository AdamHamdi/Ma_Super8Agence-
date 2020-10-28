<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param PropertyRepository $repository
     */
    
    public function index(PropertyRepository $repository): Response
    {
        $properties = $repository->findLatest();
       // dump($repository);
        return $this->render('pages/home.html.twig', [
            'properties' => $properties
        ]);
    }
    // public function index(): Response
    // {
    //     return $this->render('pages/home.html.twig', [
    //         'controller_name' => 'HomeController',
    //     ]);
    // }
}
