<?php

namespace App\Form;

use App\Entity\Station;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Validator\Constraints as Assert;

class StationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                'attr' => ['class' => 'input-text'],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le nom de la station est obligatoire']),
                    new Assert\Length([
                        'max' => 255,
                        'maxMessage' => 'Le nom de la station ne peut pas dépasser {{ limit }} caractères'
                    ])
                ]
            ])
            ->add('latitude', null, [
                'attr' => ['class' => 'input-text'],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'La latitude est obligatoire']),
                    new Assert\Type([
                        'type' => 'float',
                        'message' => 'La latitude doit être un nombre'
                    ])
                ]
            ])
            ->add('longitude', null, [
                'attr' => ['class' => 'input-text'],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'La longitude est obligatoire']),
                    new Assert\Type([
                        'type' => 'float',
                        'message' => 'La longitude doit être un nombre'
                    ])
                ]
            ])
            ->add('capacite', null, [
                'attr' => ['class' => 'input-text'],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'La capacité est obligatoire']),
                    new Assert\GreaterThan([
                        'value' => 10,
                        'message' => 'La capacité doit être supérieure à 10'
                    ])
                ]
            ])
            ->add('nombreVelo', null, [
                'attr' => ['class' => 'input-text'],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le nombre de vélos est obligatoire']),
                    new Assert\LessThanOrEqual([
                        'propertyPath' => 'parent.all[capacite].data',
                        'message' => 'Le nombre de vélos ne peut pas être supérieur à la capacité'
                    ])
                ]
            ])
            ->add('typeVelo', ChoiceType::class, [
                'choices' => [
                    'Vélo électrique' => 'velo électrique',
                    'Vélo urbain' => 'velo urbain',
                    'Vélo de route' => 'velo de route',
                ],
                'attr' => ['class' => 'input-text'],
                'expanded' => false,
                'multiple' => false,
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le type de vélo est obligatoire']),
                    new Assert\Choice([
                        'choices' => ['velo électrique', 'velo urbain', 'velo de route'],
                        'message' => 'Veuillez choisir un type de vélo valide'
                    ])
                ]
            ])
            ->add('prixHeure', null, [
                'attr' => ['class' => 'input-text'],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le prix par heure est obligatoire']),
                    new Assert\GreaterThan([
                        'value' => 0,
                        'message' => 'Le prix par heure doit être supérieur à 0'
                    ])
                ]
            ])
            ->add('pays', ChoiceType::class, [
                'choices' => $this->getCountryList(),
                'attr' => ['class' => 'input-text'],
                'expanded' => false,
                'multiple' => false,
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le pays est obligatoire']),
                    new Assert\Choice([
                        'callback' => [$this, 'getCountryList'],
                        'message' => 'Veuillez choisir un pays valide'
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Station::class,
        ]);
    }

    private function getCountryList(): array
    {
        return Countries::getNames();
    }
}
