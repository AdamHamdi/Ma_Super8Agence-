<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    //recuperer des données de la base de données 1ere methode
    /**
     * @var PrpertyRepository
     */
    private $repository;
    public function __construct(PropertyRepository $repository)
    {
        $this->repository=$repository;
    }
    /**
     * @Route("/biens", name="property.index")
     */
    public function index(): Response
    { 
        //ajouter un enregistrement dans la base de donnnées

        // $property= new Property();
        // $property->setTitle('Mon premier bien')
        //          ->setPrice(200000)
        //          ->setRooms(4)
        //          ->setBedrooms(3)
        //          ->setDescription('une petite description')
        //          ->setSurface(60)
        //          ->setFloor(4)
        //          ->setHeat(1)
        //          ->setCity('Montpellier')
        //          ->setAddress('15 Boulevard gambetta ')
        //          ->setPostalCode('34000');

        //          $em=$this->getDoctrine()->getManager();
        //          $em->persist($property);
        //          $em->flush();
        // return $this->render('property/index.html.twig', [
        //     'current_menu' => 'properties',
        // ]);

        //recuperer des données de la base de données 2eme methode

        //  $repository=$this->getDoctrine()->getRepository(Property::class);
        //  dump($repository);
         //suite de la premiere methode
        //  $this->repository;
        //troisieme methode 
        $repository = $this->repository->findAllVisisble();
        dump($repository);
        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties',
        ]);
    }
}
