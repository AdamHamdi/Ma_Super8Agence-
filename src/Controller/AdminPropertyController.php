<?php

namespace App\Controller;
use App\Entity\Property;
use App\form\PropertyType;
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminPropertyController extends AbstractController
{
    private $repository;
    public function __construct(PropertyRepository $repository)
    {
        $this->repository=$repository;
    }
    /**
     * @Route("/admin", name="admin.property.index")
     */
    public function index(): Response
    {
        $properties = $this->repository->findAll();
        return $this->render('admin/property/index.html.twig',compact('properties'));
    }
    /**
     * @Route("/admin/{id}", name="admin.property.edit")
     * @param Property $property
     * @return \Syfony\Component\HttpFoundation\Response
     */
    public function edit (Property $property, Request $request){
        $form= new Property();
        $form= $this->createForm(PropertyType::class,$form);
        $form->handleRequest($request);
      
            if($form->isSubmitted() && $form->isValid()){
                 $this->entityManager=$this->getDoctrine()->getManager();
                 $this-> entityManager->persist( $form);
                 $this-> entityManager->flush();
                 $this->flashMessage->add('success','Cet article a été ajouté avec success');
          
                 return $this->redirectToRoute('admin.property.index');
                 
                 
        }
        return $this->render('admin/property/edit.html.twig',[
            'property'=>$property,
            'form'=>$form->createView()
        ]);
    }
}
