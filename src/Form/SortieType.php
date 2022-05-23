<?php

namespace App\Form;

use App\Entity\Sortie;


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
            ->add('campus', TextType::class, [
                'mapped' => false,
            ])
            ->add('ville', TextType::class, [
                'mapped' => false,
            ])
            ->add('lieu', TextType::class, [
                'mapped' => false,
            ])
            ->add('Rue', TextType::class, [
                'mapped' => false,
            ])
            ->add('code_postale', TextType::class, [
                'mapped' => false,
            ])
            ->add('latitude', TextType::class, [
                'mapped' => false,
            ])
            ->add('longitude', TextType::class, [
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
