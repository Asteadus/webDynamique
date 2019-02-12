<?php

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class JoueurType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('dateNaissance', DateType:: class, [
                'widget' => 'choice',
                // permet de prendre la date 45 avant les +5 et -5 fait de base
                'years' => range(date('Y' )-45, date('Y')),
                // this is actually the default format for single_text
                'format' => 'dd - MM - yyyy',
            ])
            ->add('taille')
            ->add('pied', ChoiceType::class,
                array(
                    'choices' => array(
                        'Droit' => 'Droit',
                        'Gauche' => 'Droit',
                    )
                ))
            ->add('nationnalite', CountryType::class)
            // permet de choisir de plusieurs positions
            ->add('positions', EntityType::class, [
                'class' => 'AppBundle\Entity\Position',
                'choice_label' => 'nom',
                'expanded' => false,
                'mapped' => true,
                'by_reference' => false,
                'multiple' => true,
                ])
            ->add('club', EntityType::class, [
                // looks for choices from this entity
                'class' => 'AppBundle\Entity\Club',
                // uses the User.username property as the visible option string
                'choice_label' => 'nom',
                ])
            ->add("image",ImageType::class)
            ->add('submit',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Joueur'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_joueur';
    }


}
