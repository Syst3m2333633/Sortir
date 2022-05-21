<?php

namespace App\Form;

use App\Entity\Participant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CreationUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('identifiant', TextType::class, [
                'label'=> 'Pseudonyme'
            ])
            ->add('nom', TextType::class, [
                'label'=> 'Nom'
            ])
            ->add('prenom', TextType::class, [
                'label'=> 'Prenom'
            ])
            ->add('Telephone')
            ->add('email', TextType::class, [
                'label'=> 'Email'
            ])
            ->add('password', TextType::class, [
                'label'=> 'Mot de passe'
            ])

            ->add('confirmation', TextType::class, [
                'label'=> 'Confirmation'
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
