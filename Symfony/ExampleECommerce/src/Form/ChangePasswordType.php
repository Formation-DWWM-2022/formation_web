<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
        $builder
        ->add('firstname',TextType::class, [
            'label'=> 'Mon prénom', 
            'disabled'=> true
        ])
        ->add('lastname',TextType::class, [
            'label'=> 'Mon nom', 
            'disabled'=> true
        ])
        ->add('email',EmailType::class, [
            'label'=> 'Mon email', 
            'disabled'=> true
        ])
        ->add('old_password',PasswordType::class, [
            'mapped' => false,
            'label'=> 'Mon mot de passe actuel', 
            'attr' => [
                'placeholder' => 'Merci de saisir votre mot de passe actuel'
            ]
        ])
        ->add('new_password',RepeatedType::class, [
            'mapped' => false,
            'type' => PasswordType::class,
            'invalid_message' => 'Le mot de passe et la confirmation doivent etre identique.',
            'required' => true,
            'first_options' => [
                'label' => 'Votre nouveau mot de passe',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre nouveau mot de passe'
                ]
            ],
            'second_options' => [
                'label' => 'Confirmez votre nouveau mot de passe',
                'attr' => [
                    'placeholder' => 'Merci de confirmer votre nouveau mot de passe'
                ]
            ]
        ])
        ->add('submit', SubmitType::class, [
            'label'=> 'Mettre à jour' 
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
