<?php

namespace App\Form;

use App\Entity\ReservationTransport;
use App\Entity\Station;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationTransportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateRes', null, [
                'widget' => 'single_text',
            ])
            ->add('dateFin', null, [
                'widget' => 'single_text',
            ])
            ->add('prix')
            ->add('statut')
            ->add('reference')
            ->add('nombreVelo')
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id_U',
            ])
            ->add('station', EntityType::class, [
                'class' => Station::class,
                'choice_label' => 'idS',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ReservationTransport::class,
        ]);
    }
}
