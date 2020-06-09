<?php

namespace App\Form;

use App\Entity\ProductDiscount;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DiscountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('discount_value')
            ->add('date_created')
            ->add('valid_until')
            ->add('product_id')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProductDiscount::class,
        ]);
    }
}
