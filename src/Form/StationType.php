<?php

namespace App\Form;

use App\Entity\Station;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
    ->add('nom', null, [
        'attr' => ['class' => 'input-text'],
        'label_attr' => ['class' => 'label']
    ])
    ->add('latitude', null, [
        'attr' => ['class' => 'input-text'],
        'label_attr' => ['class' => 'label']
    ])
    ->add('longitude', null, [
        'attr' => ['class' => 'input-text'],
        'label_attr' => ['class' => 'label']
    ])
    ->add('capacite', null, [
        'attr' => ['class' => 'input-text'],
        'label_attr' => ['class' => 'label']
    ])
    ->add('nombreVelo', null, [
        'attr' => ['class' => 'input-text'],
        'label_attr' => ['class' => 'label']
    ])
    ->add('typeVelo', null, [
        'attr' => ['class' => 'input-text'],
        'label_attr' => ['class' => 'label']
    ])
    ->add('prixHeure', null, [
        'attr' => ['class' => 'input-text'],
        'label_attr' => ['class' => 'label']
    ])
    ->add('pays', null, [
        'attr' => ['class' => 'input-text'],
        'label_attr' => ['class' => 'label']
    ])

   ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Station::class,
        ]);
    }
}
