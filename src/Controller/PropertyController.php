<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        public function index(PaginatorInterface $paginator ,Request $request): Response
        { 
            //creer une entité qui va representer notre recherche
            //creer un formulaire
            //gerer le traitement dans le controlleur
        $properties = $paginator->paginate($this->repository->findAllVisisbleQuery(),
           $request->query->getInt('page', 1),12);
        // dump($repository);
        return $this->render('property/index.html.twig', [
            'current_menu' => 'properties',
            'properties'=>$properties
        ]);
    }

    /**
     * @Route("/biens/{slug}-{id}", name="property.show" ,requirements={"slug":"[a-z0-9\-]*"})
     */
    public function show ($slug ,$id): Response
    {
        $property=$this->repository->find($id);
        return $this->render('property/show.html.twig',[
            'property'=>$property,
            'current_menu'=>'properties'
        ]);
    }
}
