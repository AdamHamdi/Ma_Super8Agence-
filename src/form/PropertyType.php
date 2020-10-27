<?php 

namespace App\form;
use App\Entity\Property;
use phpDocumentor\Reflection\Types\False_;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
class PostType extends AbstractType{
    public function buildForm(FormBuilderInterface $bulder, array $options){

            $bulder->add('title')
                   ->add('description')
                   ->add('surface')
                   ->add('rooms')
                   ->add('bedrooms')
                   ->add('floor')
                   ->add('price')
                   ->add('heat')
                   ->add('city')
                   ->add('address')
                   ->add('postal_code')
                   ->add('sold')
                   ->add('Valider',SubmitType::class);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
            'translation_domain' => 'forms'
        ]);
    }
}
