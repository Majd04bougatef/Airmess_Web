<?php

namespace App\Form;

use App\Entity\BonPlan;
use App\Entity\ReviewBonPlan;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewBonPlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id_U')
            ->add('commente')
            ->add('rating')
            ->add('bonPlan', EntityType::class, [
                'class' => BonPlan::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ReviewBonPlan::class,
        ]);
    }
}
