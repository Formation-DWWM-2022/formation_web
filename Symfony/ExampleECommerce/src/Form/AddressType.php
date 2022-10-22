<?php

namespace App\Form;

use App\Entity\Address;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class AddressType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class, [
                'label'=> 'Nom de votre address', 
                'constraints' => new Length(null,2,30),
                'required' => true,
                'attr' => [
                    'placeholder' => 'Merci de saisir nom de votre address'
                ]
            ])
            ->add('firstname',TextType::class, [
                'label'=> 'Votre prénom', 
                'constraints' => new Length(null,2,30),
                'required' => true,
                'attr' => [
                    'placeholder' => 'Merci de saisir votre prénom'
                ]
            ])
            ->add('lastname',TextType::class, [
                'label'=> 'Votre nom', 
                'constraints' => new Length(null,2,30),
                'required' => true,
                'attr' => [
                    'placeholder' => 'Merci de saisir votre nom'
                ]
            ])
            ->add('Company',TextType::class, [
                'label'=> 'Votre societé', 
                'constraints' => new Length(null,2,30),
                'required' => false,
                'attr' => [
                    'placeholder' => 'Merci de saisir votre societé'
                ]
            ])
            ->add('address',TextareaType::class, [
                'label'=> 'Votre address', 
                'constraints' => new Length(null,2,30),
                'required' => true,
                'attr' => [
                    'placeholder' => 'Merci de saisir votre address'
                ]
            ])
            ->add('codepostal',TextType::class, [
                'label'=> 'Votre code postal', 
                'constraints' => new Length(null,2,30),
                'required' => true,
                'attr' => [
                    'placeholder' => 'Merci de saisir votre code postal'
                ]
            ])
            ->add('city',TextType::class, [
                'label'=> 'Votre ville', 
                'constraints' => new Length(null,2,30),
                'required' => true,
                'attr' => [
                    'placeholder' => 'Merci de saisir votre ville'
                ]
            ])
            ->add('pays',CountryType::class, [
                'label'=> 'Votre pays',  
                'required' => true,
                'attr' => [
                    'placeholder' => 'Merci de saisir votre pays',
                    'class' => 'form-control'
                ]
            ])
            ->add('phone',TelType::class, [
                'label'=> 'Votre phone',  
                'required' => true,
                'attr' => [
                    'placeholder' => 'Merci de saisir votre phone'
                ]
            ])
            ->add('submit', SubmitType::class,[
                'label' => 'Valider',
                'attr' => [
                    'class' => 'btn btn-info'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Address::class,
        ]);
    }
}
