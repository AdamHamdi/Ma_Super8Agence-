<?php 

namespace App\form;

use App\Entity\Property;
use App\Entity\Option;
use Doctrine\ORM\Mapping\Entity;
use phpDocumentor\Reflection\Types\False_;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $bulder, array $options)
    {
        $bulder->add('title')
                   ->add('description')
                   ->add('surface')
                   ->add('rooms')
                   ->add('bedrooms')
                   ->add('floor')
                   ->add('price')
                  //->add('heat')
                  ->add('heat', ChoiceType::class, ['choices'=> array_flip(Property::HEAT) ])
                  ->add('options',EntityType::class,[
                      'class' => Option::class,
                      'choice_label'=>'name',
                      'multiple' =>true

                  ])
                  ->add('imageFile',FileType::class,[
                      'required'=>false
                  ])
                   ->add('city')
                   ->add('address')
                   ->add('postal_code')
                   ->add('sold');
                   
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
            'translation_domain' => 'forms'
        ]);
    }
    private function getChoices()
    {
        $choices=Property::HEAT;
        $output=[];
        foreach ($choices as $k => $v) {
            $output[$v]=$k;
        }
        return $output;
    }

}
