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
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Doctrine\ORM\EntityManagerInterface;

class ExpenseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('amount', NumberType::class, [
                'label' => 'Amount',
                'attr' => [
                    'placeholder' => 'Enter expense amount',
                    'min' => 0.01,
                    'step' => 0.01
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter an amount',
                    ]),
                ],
                'html5' => true,
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => [
                    'placeholder' => 'Enter expense description',
                    'rows' => 4,
                    'maxlength' => 500
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a description',
                    ]),
                ],
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
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please select a category',
                    ]),
                ],
            ])
            ->add('dateE', DateType::class, [
                'label' => 'Date',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'datepicker',
                    'max' => (new \DateTime())->format('Y-m-d')
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please select a date',
                    ]),
                ],
                'html5' => true,
            ])
            ->add('nameEx', TextType::class, [
                'label' => 'Expense Name',
                'attr' => [
                    'placeholder' => 'Enter expense name',
                    'maxlength' => 100
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter an expense name',
                    ]),
                ],
            ])
        ;
        
        // Add the image file field with minimal constraints
        $imageConstraints = [
            new File([
                'maxSize' => '5M',
                'mimeTypes' => [
                    'image/jpeg',
                    'image/png',
                    'image/gif',
                    'image/webp',
                ],
                'mimeTypesMessage' => 'Please upload a valid image (JPEG, PNG, GIF, WEBP)',
                'maxSizeMessage' => 'The file is too large ({{ size }} {{ suffix }}). Maximum allowed size is {{ limit }} {{ suffix }}.',
            ])
        ];
        
        // Add NotBlank constraint if image is required
        if (!isset($options['image_required']) || $options['image_required']) {
            $imageConstraints[] = new NotBlank([
                'message' => 'Please upload a receipt image',
            ]);
        }
        
        $builder->add('imageFile', FileType::class, [
            'label' => 'Receipt Image',
            'mapped' => false,
            'required' => !isset($options['image_required']) || $options['image_required'],
            'constraints' => $imageConstraints,
            'attr' => [
                'class' => 'form-control-file',
                'accept' => 'image/jpeg,image/png,image/gif,image/webp'
            ],
            'help' => 'Upload a receipt image (JPEG, PNG, GIF, WEBP). Max size: 5MB',
        ]);
        
        // Only add the user field if we're in admin mode
        // Otherwise, the user will be set automatically from the session in the controller
        if (isset($options['is_admin']) && $options['is_admin']) {
            $builder->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => function (User $user) {
                    return $user->getName() . ' ' . ($user->getPrenom() ?? '');
                },
                'placeholder' => 'Select a user',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please select a user',
                    ]),
                ],
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Expense::class,
            'is_admin' => false,
            'validation_groups' => ['Default'],
            'image_required' => true,
        ]);
        
        // Add the options
        $resolver->setDefined(['user', 'is_admin', 'image_required']);
    }
}
