<?php

namespace App\Form;

use App\Entity\Intervenant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\Regex;

class IntervenantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => ['maxlength ' => 255]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => ['maxlength ' => 255]
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Téléphone',
                'attr' => ['maxlength ' => 20],
                'constraints' => [
                    new Regex([
                        'pattern' => '/^\d{10,20}$/',
                        'message' => 'Le numéro de téléphone doit contenir uniquement des chiffres et faire entre 10 et 20 caractères.',
                    ])
                ]
            ])
            ->add('mdp', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => ['maxlength ' => 255]
            ])
            ->add('nomDeScene', TextType::class, [
                'label' => 'Nom de scène',
                'attr' => ['maxlength ' => 255]
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
            'data_class' => Intervenant::class,
        ]);
    }
}
