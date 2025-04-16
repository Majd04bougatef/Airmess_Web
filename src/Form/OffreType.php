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
use App\Enum\OffreStatus;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('place', TextType::class, [
                'label' => 'Lieu',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('priceInit', NumberType::class, [
                'label' => 'Prix Initial',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('priceAfter', NumberType::class, [
                'label' => 'Prix Après Réduction',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('startDate', DateTimeType::class, [
                'label' => 'Date de Début',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('endDate', DateTimeType::class, [
                'label' => 'Date de Fin',
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('numberLimit', IntegerType::class, [
                'label' => 'Nombre Limite',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('imagePath', TextType::class, [
                'label' => 'Chemin de l\'Image',
                'required' => false,
                'attr' => ['class' => 'form-control'],
            ])
            ->add('aidesc', TextareaType::class, [
                'label' => 'Aide Description',
                'attr' => ['class' => 'form-control'],
            ])
            ->add('statusoff', ChoiceType::class, [
                'choices' => [
                    'En attente' => OffreStatus::EN_ATTENTE,
                    'Confirmé' => OffreStatus::CONFIRME,
                    'Rejeté' => OffreStatus::REJETE,
                ],
                'label' => 'Statut de l\'offre',
                'attr' => ['class' => 'form-control'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
        ]);
    }
}
