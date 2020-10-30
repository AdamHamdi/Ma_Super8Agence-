<?php

namespace App\Form;

use App\Entity\PropertySearch;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maxPrice', IntegerType::class,[
                'required'=>false ,
                'label' =>false,
                'attr'=>[
                    'placeholder' => 'Surface minimale'
                ]

            ])
            ->add('minSurface', IntegerType::class,[
                'required'=>false ,
                'label' =>false,
                'attr'=>[
                    'placeholder' => 'Budget maximale'
                ]

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PropertySearch::class,
        ]);
    }
}
