<?php

namespace App\Form;

use App\Entity\Commentaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class CommentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description', null, [
                'label' => 'Votre commentaire',
                'attr' => [
                    'placeholder' => 'Écrivez votre commentaire ici...',
                    'rows' => 3
                ],
                'constraints' => [
                    new NotBlank(['message' => 'Le commentaire ne peut pas être vide']),
                    new Length([
                        'min' => 5,
                        'max' => 1000,
                        'minMessage' => 'Le commentaire doit faire au moins {{ limit }} caractères',
                        'maxMessage' => 'Le commentaire ne peut pas dépasser {{ limit }} caractères'
                    ])
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentaire::class,
        ]);
    }
}
