<?php

namespace App\Form;

use App\Entity\Campus;
use App\Entity\Lieu;
use App\Entity\Participant;
use App\Entity\Sortie;


use App\Entity\Ville;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SortieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('dateHeureDebut', DateType::class, [
                'html5' => true,
                'widget' => 'single_text',
            ])
            ->add('duree', TextType::class, [
                'label' => 'Duree'
            ])
            ->add('dateLimiteInscription', DateType::class, [
                'html5' => true,
                'widget' => 'single_text',
            ])
            ->add('nbInscriptionsMax')
            ->add('infosSortie')
            ->add('etat')
            ->add('campus', EntityType::class, [
                'class' => Campus::class,
                'mapped' => false,
            ])
            ->add('ville', EntityType::class, [
                'class' => Ville::class,
                'mapped' => false,
            ])
            ->add('lieu', EntityType::class, [
                'class' => Lieu::class,
                'mapped' => false,
            ])
            ->add('Rue', EntityType::class, [
                'class' => Lieu::class,
                'mapped' => false,
            ])
            ->add('code_postale', EntityType::class, [
                'class' => Ville::class,
                'mapped' => false,
            ])
            ->add('latitude', EntityType::class, [
                'class' => Lieu::class,
                'mapped' => false,
            ])
            ->add('longitude', EntityType::class, [
                'class' => Lieu::class,
                'mapped' => false,
            ])
            ->add('pseudo', EntityType::class, [
                'class' => Participant::class,
                'mapped' => false,
            ])
            ->add('nom', EntityType::class, [
                'class' => Participant::class,
                'mapped' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sortie::class,
        ]);
    }
}
