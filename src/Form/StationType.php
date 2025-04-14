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

class StationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                'attr' => ['class' => 'input-text']
            ])
            ->add('latitude', null, [
                'attr' => ['class' => 'input-text']
            ])
            ->add('longitude', null, [
                'attr' => ['class' => 'input-text']
            ])
            ->add('capacite', null, [
                'attr' => ['class' => 'input-text']
            ])
            ->add('nombreVelo', null, [
                'attr' => ['class' => 'input-text']
            ])
            ->add('typeVelo', ChoiceType::class, [
                'choices' => [
                    'Vélo électrique' => 'velo électrique',
                    'Vélo urbain' => 'velo urbain',
                    'Vélo de route' => 'velo de route',
                ],
                'attr' => ['class' => 'input-text'],
                'expanded' => false,
                'multiple' => false
            ])
            ->add('prixHeure', null, [
                'attr' => ['class' => 'input-text']
            ])
            ->add('pays', ChoiceType::class, [
                'choices' => $this->getCountryList(),
                'attr' => ['class' => 'input-text'],
                'expanded' => false,
                'multiple' => false
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
