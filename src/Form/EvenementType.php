<?php

namespace App\Form;

use App\Entity\Activite;
use App\Entity\Evenement;
use App\Entity\Organisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de l\'événement',
                'attr' => ['maxlength ' => 255]
            ])
            ->add('type', ChoiceType::class, [
                'choices'  => [
                    'Gaming & E-sport' => 'Gaming & E-sport',
                    'Manga & Japon' => 'Manga & Japon',
                    'Rétro-gaming' => 'Rétro-gaming',
                    'Fantasy & Médiéval' => 'Fantasy & Médiéval',
                    'Technologie & Innovation' => 'Technologie & Innovation',
                    'Soirées geeks & communautaires' => 'Soirées geeks & communautaires',
                ],
                'label' => 'Type d\'événement',
            ])
            ->add('date')
            ->add('localisation')
            ->add('horaires')
            ->add('adresse')
            ->add('organisateur', EntityType::class, [
                'class' => Organisateur::class,
                'choice_label' => 'nom',
            ])
            ->add('activites', EntityType::class, [
                'class' => Activite::class,
                'choice_label' => 'nom',
                'multiple' => true,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
