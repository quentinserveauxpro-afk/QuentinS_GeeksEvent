<?php

namespace App\Form;

use App\Entity\Participant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Regex;

class ParticipantType extends AbstractType
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
            ->add('telephone' , TelType::class, [
                'label' => 'Téléphone',
                'attr' => ['maxlength ' => 20],
                'required' => false,
                'constraints' => [
                    new Regex([
                        'pattern' => '/^\d{10,20}$/',
                        'message' => 'Le numéro de téléphone doit contenir uniquement des chiffres et avoir entre 10 et 20 caractères.',
                    ])
                ]])
            ->add('mdp', PasswordType::class, [
                'label' => 'Mot de passe',
                'attr' => ['maxlength ' => 255]
                ])
            ->add('pseudo', TextType::class, [
                'label' => 'Pseudo',
                'attr' => ['maxlength ' => 100]
                ])
            ->add('adresse', TextareaType::class, ['label' => 'Adresse', 'required' => false])
            ->add('dateDeNaissance', DateType::class, [
                'label' => 'Date de naissance',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
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
            'data_class' => Participant::class,
        ]);
    }
}
