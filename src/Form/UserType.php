<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('prenom')
            ->add('email')
            ->add('password')
            ->add('roleUser')
            ->add('dateNaiss', null, [
                'widget' => 'single_text',
            ])
            ->add('phoneNumber')
            ->add('statut')
            ->add('diamond')
            ->add('deleteFlag')
            ->add('imagesU')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
