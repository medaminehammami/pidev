<?php

namespace App\Form;

use App\Entity\Commentaire;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('description')
            ->add('utilisateur', EntityType::class, [
                'class' => 'App\Entity\Utilisateur', // Replace with the actual namespace of your Author entity
                'choice_label' => 'nom', // Assuming Author entity has a method getFullName() that returns the author's full name
                'placeholder' => 'Select a User', // Optional, adds an empty option at the top
                'required' => true, // Set to true if the author selection is mandatory
               ])
            ->add('comment',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentaire::class,
        ]);
    }
}
