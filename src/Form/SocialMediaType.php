<?php

namespace App\Form;

use App\Entity\SocialMedia;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class SocialMediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => 'Titre',
                'attr' => ['placeholder' => 'Titre de la publication'],
                'constraints' => [
                    new Length([
                        'min' => 5,
                        'max' => 255,
                        'minMessage' => 'Le titre doit faire au moins {{ limit }} caractères',
                        'maxMessage' => 'Le titre ne peut pas dépasser {{ limit }} caractères'
                    ])
                ]
            ])
            ->add('contenu', TextareaType::class, [
                'label' => 'Contenu',
                'attr' => ['rows' => 5, 'placeholder' => 'Écrivez votre publication ici...'],
                'constraints' => [
                    new Length([
                        'min' => 10,
                        'minMessage' => 'Le contenu doit faire au moins {{ limit }} caractères'
                    ])
                ]
            ])
            ->add('lieu', TextType::class, [
                'label' => 'Lieu',
                'required' => false,
                'attr' => ['placeholder' => 'Où cela se passe-t-il ?'],
                'constraints' => [
                    new Length([
                        'max' => 255,
                        'maxMessage' => 'Le lieu ne peut pas dépasser {{ limit }} caractères'
                    ])
                ]
            ])
            ->add('imagemedia', FileType::class, [
                'label' => 'Image/Vidéo',
                'mapped' => false,
                'required' => false,
                'attr' => [
                    'accept' => 'image/jpeg, image/jpg, image/png, image/gif, image/avif, video/x-msvideo, video/avi, video/msvideo, video/mpeg, video/mp4',
                    'class' => 'form-control-file',
                ],
                'constraints' => [
                    new File([
                        'maxSize' => '10M',
                        'mimeTypes' => [
                            'image/jpeg', 
                            'image/jpg', 
                            'image/png', 
                            'image/gif',
                            'image/avif',
                            'video/x-msvideo', // AVI mime type
                            'video/avi',
                            'video/msvideo',
                            'video/mpeg',
                            'video/mp4'
                        ],
                        'mimeTypesMessage' => 'Veuillez télécharger une image/vidéo valide (JPG, PNG, GIF, AVIF, AVI, MP4)',
                    ])
                ],
                'help' => 'Formats acceptés: JPG, PNG, GIF, AVIF, AVI, MP4. Taille maximale: 10MB',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SocialMedia::class,
            'attr' => [
                'enctype' => 'multipart/form-data',
            ],
        ]);
    }
}
