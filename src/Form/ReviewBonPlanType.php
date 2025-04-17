<?php

namespace App\Form;

use App\Entity\BonPlan;
use App\Entity\ReviewBonPlan;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;
use Symfony\Component\Validator\Constraints\Length;

class ReviewBonPlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id_U', IntegerType::class, [
                'label' => 'ID Utilisateur',
                'attr' => [
                    'placeholder' => 'Entrez l\'ID de l\'utilisateur',
                    'min' => 1
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer l\'ID de l\'utilisateur'
                    ])
                ]
            ])
            ->add('rating', RangeType::class, [
                'label' => 'Note (1-5)',
                'attr' => [
                    'min' => 1,
                    'max' => 5,
                    'step' => 1,
                    'class' => 'form-range'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez attribuer une note'
                    ]),
                    new Range([
                        'min' => 1,
                        'max' => 5,
                        'minMessage' => 'La note minimale est 1',
                        'maxMessage' => 'La note maximale est 5'
                    ])
                ]
            ])
            ->add('commente', TextareaType::class, [
                'label' => 'Commentaire',
                'attr' => [
                    'placeholder' => 'Entrez votre commentaire ici',
                    'rows' => 4
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un commentaire'
                    ]),
                    new Length([
                        'min' => 3,
                        'max' => 500,
                        'minMessage' => 'Le commentaire doit contenir au moins {{ limit }} caractères',
                        'maxMessage' => 'Le commentaire ne peut pas dépasser {{ limit }} caractères'
                    ])
                ]
            ])
            ->add('bonPlan', EntityType::class, [
                'class' => BonPlan::class,
                'choice_label' => 'nomplace',
                'label' => 'Bon Plan',
                'placeholder' => 'Sélectionnez un bon plan',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez sélectionner un bon plan'
                    ])
                ]
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
