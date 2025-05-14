<?php

namespace App\Form;

use App\Entity\BonPlan;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\File;


class BonPlanType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('id_U')
            ->add('nomplace')
            ->add('localisation')
            ->add('latitude', HiddenType::class)
            ->add('longitude', HiddenType::class)
            ->add('description')
            ->add('typePlace')
            ->add('imageBP', FileType::class, [
                'label' => 'Image',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'mimeTypes' => ['image/jpg', 'image/png', 'image/webp'],
                        'mimeTypesMessage' => 'Merci d\'uploader une image valide (JPG, PNG, WEBP)',
                    ])
                ],
            ])
            ->add('hasVRContent', \Symfony\Component\Form\Extension\Core\Type\CheckboxType::class, [
                'label' => 'Activer l\'expérience VR',
                'required' => false,
            ])
            ->add('vr360ImagePath', FileType::class, [
                'label' => 'Image 360° (pour VR)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'mimeTypes' => ['image/jpg', 'image/png', 'image/webp'],
                        'mimeTypesMessage' => 'Merci d\'uploader une image 360° valide (JPG, PNG, WEBP)',
                    ])
                ],
            ])
            ->add('vrModelPath', FileType::class, [
                'label' => 'Modèle 3D (pour VR, format GLTF/GLB)',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'mimeTypes' => ['model/gltf-binary', 'model/gltf+json', 'application/octet-stream'],
                        'mimeTypesMessage' => 'Merci d\'uploader un modèle 3D valide (GLTF/GLB)',
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => BonPlan::class,
        ]);
    }
}
