<?php

namespace App\Form;

use App\Entity\BonPlan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BonPlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id_U')
            ->add('nomplace')
            ->add('localisation')
            ->add('description')
            ->add('typePlace')
            ->add('imageBP')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BonPlan::class,
        ]);
    }
}
