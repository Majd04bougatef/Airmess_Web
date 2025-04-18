<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;

class CaptchaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('captcha', TextType::class, [
            'label' => 'Security Code',
            'attr' => [
                'autocomplete' => 'off',
                'placeholder' => 'Enter the security code',
            ],
            'constraints' => [
                new NotBlank([
                    'message' => 'Please enter the security code',
                ]),
            ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'mapped' => false,
        ]);
    }

    public function getBlockPrefix(): string
    {
        return 'captcha_type';
    }
    
    public function buildView(FormView $view, FormInterface $form, array $options): void
    {
        parent::buildView($view, $form, $options);
        // Add captcha image to the view
        $view->vars['captcha_img_url'] = '/captcha?'.time();
    }
} 