<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\IsTrue;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateRes', DateTimeType::class, [
                'widget' => 'single_text',
                'label' => 'Date de réservation *',
                'attr' => [
                    'class' => 'form-control',
                    'min' => (new \DateTime())->format('Y-m-d\TH:i'),
                    'data-error-message' => 'La date de réservation est obligatoire.',
                    'required' => true
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'La date de réservation est obligatoire.'
                    ]),
                    new GreaterThanOrEqual([
                        'value' => new \DateTime(),
                        'message' => 'La date de réservation doit être au moins aujourd\'hui ou ultérieure.'
                    ])
                ],
                'error_bubbling' => false,
            ])
            ->add('termsAccepted', CheckboxType::class, [
                'label' => 'J\'accepte les conditions générales *',
                'mapped' => false,
                'required' => true,
                'attr' => [
                    'class' => 'form-check-input',
                    'data-error-message' => 'Vous devez accepter les conditions générales.',
                ],
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les conditions générales pour continuer.'
                    ])
                ],
                'error_bubbling' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
            'validation_groups' => ['Default'],
            'attr' => [
                'novalidate' => 'novalidate', // Désactive la validation HTML5 pour utiliser notre propre validation
                'class' => 'needs-validation',
            ],
            'error_bubbling' => false,
        ]);
    }
}
