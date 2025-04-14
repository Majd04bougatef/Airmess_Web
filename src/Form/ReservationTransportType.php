<?php

namespace App\Form;

use App\Entity\ReservationTransport;
use App\Entity\Station;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class ReservationTransportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateRes', null, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'label'],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'La date de réservation est obligatoire']),
                    new Assert\GreaterThanOrEqual([
                        'value' => 'today',
                        'message' => 'La date de réservation doit être aujourd\'hui ou dans le futur'
                    ])
                ]
            ])
            ->add('dateFin', null, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'label'],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'La date de fin est obligatoire']),
                    new Assert\GreaterThan([
                        'propertyPath' => 'parent.all[dateRes].data',
                        'message' => 'La date de fin doit être après la date de réservation'
                    ])
                ]
            ])      
            ->add('nombreVelo', null, [
                'attr' => ['class' => 'form-control'],
                'label_attr' => ['class' => 'label'],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le nombre de vélos est obligatoire']),
                    new Assert\GreaterThan([
                        'value' => 0,
                        'message' => 'Le nombre de vélos doit être supérieur à 0'
                    ]),
                    new Assert\LessThanOrEqual([
                        'value' => 10,
                        'message' => 'Le nombre de vélos ne peut pas dépasser 10'
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ReservationTransport::class,
        ]);
    }
}
