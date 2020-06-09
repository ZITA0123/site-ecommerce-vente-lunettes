<?php

namespace App\Form;

use App\Controller\SearchDataController;
use App\Entity\Categorie;
use App\Entity\Product;
use App\Entity\Produit;
use PhpParser\Builder\Property;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('q',TextType::class,[
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'rechercher'
                ]
            ])
            ->add('min',NumberType::class,[
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Prix min'
                ]
            ])
            ->add('max',NumberType::class,[
                'label'=>false,
                'required'=>false,
                'attr'=>[
                    'placeholder'=>'Prix max'
                ]
            ])
            ->add('promo',CheckboxType::class,[
                'label'=>'En promotion',
                'required'=>false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchDataController::class,
            'method'=> 'GET',
            'csrf_protection'=>false,
        ]);
    }
    public function getBlockPrefix()
    {
        return '';
    }
}
