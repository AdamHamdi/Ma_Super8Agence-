<?php

namespace App\Controller;
use App\Entity\Property;
use App\form\PropertyType;
use App\Repository\PropertyRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;

class AdminPropertyController extends AbstractController
{
    private $repository;
    private $em;
   
    public function __construct( PropertyRepository $repository ,EntityManagerInterface $em){
        
        
        $this->repository=$repository;
        $this->em=$em;
    }
    /**
     * @Route("/admin/property/create" , name="admin.property.create")
     */
    public function new(Request $request)
    {
        $property= new Property();
        $form=$this->createForm(PropertyType::class,$property);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
                 $this->em=$this->getDoctrine()->getManager();
                 $this->em->persist($property);
                 $this->em->flush();
                 $this->addFlash('success','Le bien a été ajouté avec success');
                 return $this->redirectToRoute('admin.property.index');
                 
         
               
        }
        return $this->render('admin/property/new.html.twig',[
            'property'=>$property,
            'form'=>$form->createView()
        ]);
    }
    /**
     * @Route("/admin", name="admin.property.index")
     */
    public function index(PaginatorInterface $paginator ,Request $request): Response
    {
        $properties = $paginator->paginate($this->repository->findAllQuery(),
           $request->query->getInt('page', 1),12);
        return $this->render('admin/property/index.html.twig',compact('properties'));
    }
    /**
     * @Route("/admin/property/{id}", name="admin.property.edit")
     * @param Property $property
     * @return \Syfony\Component\HttpFoundation\Response
     */
    public function edit (Property $property, Request $request){
       
        $form=$this->createForm(PropertyType::class,$property);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
                 
               
                 $this->em->flush();
                 $this->addFlash('success','Ce bien a été modifié avec success');
         
          
                 return $this->redirectToRoute('admin.property.index');
               
        }
        return $this->render('admin/property/edit.html.twig',[
            'property'=>$property,
            'form'=>$form->createView()
        ]);
    }
    /**
     * @Route("/admin/property/delete/{id}", name="admin.property.delete" ,methods="DELETE")
     */
    public function delete(Property $property)
    {
        $this->em->remove($property);
        $this->em->flush();
        $this->addFlash('danger', 'Ce bien a été supprimé avec success');
        return $this->redirectToRoute('admin.property.index');
               
        
        
    }
}
