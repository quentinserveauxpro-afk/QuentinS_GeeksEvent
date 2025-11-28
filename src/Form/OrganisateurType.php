<?php

namespace App\Form;

use App\Entity\Organisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\Regex;

class OrganisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de l\'organisateur',
                'attr' => ['maxlength ' => 255]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse e-mail',
                'attr' => ['maxlength ' => 255]
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Numéro de téléphone',
                'attr' => ['maxlength ' => 20],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^\d{10,20}$/',
                        'message' => 'Le numéro de téléphone doit contenir uniquement des chiffres et avoir entre 10 et 20 caractères.',
                    ])
                ]
            ])
            ->add('mdp', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => ['maxlength ' => 255]
            ])
            ->add('siret', TextType::class, [
                'label' => 'Numéro SIRET',
                'attr' => ['maxlength ' => 14],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[0-9]{14}$/',
                        'message' => 'Le SIRET doit contenir uniquement des chiffres et avoir une longueur de 14 caractères.',
                    ]),
                    new Regex([
                        'pattern' => '/^(0[1-9]|[1-9][0-9])[0-9]{12}$/',
                        'message' => 'Le SIRET doit avoir le format XX XXXXXXXXXX.',
                    ])
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => ['class' => 'btn btn-primary']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Organisateur::class,
        ]);
    }
}
