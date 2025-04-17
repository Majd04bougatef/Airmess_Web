<?php

namespace App\Form;

use App\Entity\Offre;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Type;
use App\Enum\OffreStatus;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description', TextareaType::class, [
                'label' => 'Titre *',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez le titre de l\'offre...',
                    'data-error-message' => 'Le titre est obligatoire.',
                    'required' => true
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le titre est obligatoire.'
                    ]),
                    new Length([
                        'min' => 10,
                        'max' => 1000,
                        'minMessage' => 'Le titre doit comporter au moins {{ limit }} caractères.',
                        'maxMessage' => 'Le titre ne peut pas dépasser {{ limit }} caractères.'
                    ])
                ],
                'error_bubbling' => false,
            ])
            ->add('place', TextType::class, [
                'label' => 'Lieu *',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez le lieu...',
                    'data-error-message' => 'Le lieu est obligatoire.',
                    'required' => true
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le lieu est obligatoire.'
                    ]),
                    new Length([
                        'min' => 2,
                        'max' => 255,
                        'minMessage' => 'Le lieu doit comporter au moins {{ limit }} caractères.',
                        'maxMessage' => 'Le lieu ne peut pas dépasser {{ limit }} caractères.'
                    ])
                ],
                'error_bubbling' => false,
            ])
            ->add('priceInit', NumberType::class, [
                'label' => 'Prix Initial *',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez le prix initial...',
                    'data-error-message' => 'Le prix initial est obligatoire.',
                    'required' => true,
                    'min' => 0.01,
                    'step' => 0.01
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le prix initial est obligatoire.'
                    ]),
                    new Positive([
                        'message' => 'Le prix initial doit être un nombre positif.'
                    ]),
                    new Type([
                        'type' => 'numeric',
                        'message' => 'Veuillez entrer un nombre valide.'
                    ])
                ],
                'error_bubbling' => false,
            ])
            ->add('priceAfter', NumberType::class, [
                'label' => 'Prix Après Réduction *',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez le prix après réduction...',
                    'data-error-message' => 'Le prix après réduction est obligatoire.',
                    'required' => true,
                    'min' => 0.01,
                    'step' => 0.01
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le prix après réduction est obligatoire.'
                    ]),
                    new Positive([
                        'message' => 'Le prix après réduction doit être un nombre positif.'
                    ]),
                    new Type([
                        'type' => 'numeric',
                        'message' => 'Veuillez entrer un nombre valide.'
                    ])
                ],
                'error_bubbling' => false,
            ])
            ->add('startDate', DateTimeType::class, [
                'label' => 'Date de Début *',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                    'data-error-message' => 'La date de début est obligatoire.',
                    'required' => true,
                    'min' => (new \DateTime())->format('Y-m-d\TH:i')
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'La date de début est obligatoire.'
                    ]),
                    new GreaterThanOrEqual([
                        'value' => new \DateTime(),
                        'message' => 'La date de début doit être ultérieure à aujourd\'hui.'
                    ])
                ],
                'error_bubbling' => false,
            ])
            ->add('endDate', DateTimeType::class, [
                'label' => 'Date de Fin *',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control',
                    'data-error-message' => 'La date de fin est obligatoire.',
                    'required' => true,
                    'min' => (new \DateTime())->format('Y-m-d\TH:i')
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'La date de fin est obligatoire.'
                    ]),
                    new GreaterThan([
                        'propertyPath' => 'parent.all[startDate].data',
                        'message' => 'La date de fin doit être ultérieure à la date de début.'
                    ])
                ],
                'error_bubbling' => false,
            ])
            ->add('numberLimit', IntegerType::class, [
                'label' => 'Nombre de Places *',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez le nombre de places disponibles...',
                    'data-error-message' => 'Le nombre de places est obligatoire.',
                    'required' => true,
                    'min' => 1,
                    'step' => 1
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le nombre de places est obligatoire.'
                    ]),
                    new Positive([
                        'message' => 'Le nombre de places doit être un nombre positif.'
                    ]),
                    new Type([
                        'type' => 'integer',
                        'message' => 'Veuillez entrer un nombre entier.'
                    ])
                ],
                'error_bubbling' => false,
            ])
            ->add('imageFile', FileType::class, [
                'label' => 'Image de l\'offre *',
                'mapped' => false,
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'accept' => 'image/jpeg, image/jpg, image/png, image/webp',
                    'data-error-message' => 'L\'image est obligatoire.'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'L\'image est obligatoire.'
                    ]),
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/jpg',
                            'image/png',
                            'image/webp'
                        ],
                        'mimeTypesMessage' => 'Veuillez télécharger une image valide (JPG, PNG, WEBP)',
                        'maxSizeMessage' => 'L\'image est trop volumineuse. La taille maximale autorisée est {{ limit }}.'
                    ])
                ],
                'help' => 'Formats acceptés : JPG, PNG, WEBP. Taille maximale : 5 Mo',
                'error_bubbling' => false,
            ])
            ->add('aidesc', TextareaType::class, [
                'label' => 'Aide Description',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez des informations supplémentaires...',
                    'rows' => 4,
                    'style' => 'resize: vertical;'
                ],
                'required' => false,
                'help' => 'Vous pouvez ajouter ici des informations complémentaires sur votre offre, comme les services inclus, les conditions particulières, etc.',
                'error_bubbling' => false,
            ])
            ->add('statusoff', ChoiceType::class, [
                'choices' => [
                    'En attente' => OffreStatus::EN_ATTENTE,
                    'Confirmé' => OffreStatus::CONFIRME,
                    'Rejeté' => OffreStatus::REJETE,
                ],
                'label' => 'Statut de l\'offre *',
                'attr' => [
                    'class' => 'form-control',
                    'data-error-message' => 'Le statut est obligatoire.',
                    'required' => true
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le statut est obligatoire.'
                    ])
                ],
                'error_bubbling' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
            'validation_groups' => ['Default'],
            'attr' => [
                'novalidate' => 'novalidate', // Désactive la validation HTML5 pour utiliser notre propre validation
            ],
            'error_bubbling' => false,
        ]);
    }
}
