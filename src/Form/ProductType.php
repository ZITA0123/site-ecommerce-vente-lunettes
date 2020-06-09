<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('designation')
            ->add('quantite')
            ->add('prix')
            ->add('photo')
            ->add('disponible')
            ->add('couleur')
            ->add('forme')
            ->add('marque')
            ->add('type')
            ->add('categorie')
            ->add('productsDiscount')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
