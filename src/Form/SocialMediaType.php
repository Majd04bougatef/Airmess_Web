<?php

namespace App\Form;

use App\Entity\SocialMedia;
// Remove the 'use App\Entity\User;' and 'EntityType' lines as they are no longer needed
// use App\Entity\User;
// use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType; // Good for content
use Symfony\Component\Form\Extension\Core\Type\TextType;     // Good for titre/lieu
use Symfony\Component\Form\Extension\Core\Type\FileType;      // For image uploads
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File; // For image validation

class SocialMediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre',
                'attr' => ['placeholder' => 'Titre de la publication']
            ])
            ->add('contenu', TextareaType::class, [
                'label' => 'Contenu',
                'attr' => ['rows' => 5, 'placeholder' => 'Écrivez votre publication ici...']
            ])
            ->add('lieu', TextType::class, [
                'label' => 'Lieu',
                'required' => false, // Make it optional if desired
                'attr' => ['placeholder' => 'Où cela se passe-t-il ?']
            ])
            // Use FileType for uploads. You'll need to handle the upload in the controller.
            ->add('imagemedia', FileType::class, [
                'label' => 'Image (JPG, PNG, GIF)',
                'mapped' => false, // Tell Symfony this doesn't directly map to the 'imagemedia' string property
                'required' => false, // Make image upload optional
                'constraints' => [
                    new File([
                        'maxSize' => '2048k', // Example max size: 2MB
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/gif',
                        ],
                        'mimeTypesMessage' => 'Veuillez télécharger une image valide (JPG, PNG, GIF)',
                    ])
                ],
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SocialMedia::class,
        ]);
    }
}