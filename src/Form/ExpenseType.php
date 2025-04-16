<?php

namespace App\Form;

use App\Entity\Expense;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ExpenseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('amount', NumberType::class, [
                'label' => 'Amount',
                'attr' => ['placeholder' => 'Enter expense amount']
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => ['placeholder' => 'Enter expense description', 'rows' => 4]
            ])
            ->add('category', ChoiceType::class, [
                'label' => 'Category',
                'choices' => [
                    'Food' => 'Food',
                    'Transport' => 'Transport',
                    'Accommodation' => 'Accommodation',
                    'Entertainment' => 'Entertainment',
                    'Shopping' => 'Shopping',
                    'Other' => 'Other'
                ]
            ])
            ->add('dateE', DateType::class, [
                'label' => 'Date',
                'widget' => 'single_text',
                'attr' => ['class' => 'datepicker']
            ])
            ->add('nameEx', TextType::class, [
                'label' => 'Expense Name',
                'attr' => ['placeholder' => 'Enter expense name']
            ])
            ->add('imageFile', FileType::class, [
                'label' => 'Receipt Image',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/gif',
                            'image/webp',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image (JPEG, PNG, GIF, WEBP)',
                    ])
                ],
                'attr' => ['class' => 'form-control-file']
            ])
            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => function (User $user) {
                    return $user->getName() . ' ' . ($user->getPrenom() ?? '');
                },
                'placeholder' => 'Select a user',
                'required' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Expense::class,
        ]);
        
        // Add the 'user' option
        $resolver->setDefined(['user']);
    }
}
