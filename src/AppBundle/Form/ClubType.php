<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ClubType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('dateCreation' , DateType:: class, [
                'widget' => 'choice',
                'years' => range(date('Y' )-150, date('Y')),
                // this is actually the default format for single_text
                'format' => 'dd - MM - yyyy',
            ])
            ->add('stade')
            ->add('siteOfficiel')
            ->add('image', ImageType::class)
            ->add('entraineur', EntityType::class, [
                // looks for choices from this entity
                'class' => 'AppBundle\Entity\Entraineur',

                // uses the User.username property as the visible option string
                'choice_label' => 'nom',
            ])
            ->add('submit',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Club'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_club';
    }


}
