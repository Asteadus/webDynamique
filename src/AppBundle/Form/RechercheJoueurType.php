<?php
/**
 * Created by PhpStorm.
 * User: aymer
 * Date: 24-01-19
 * Time: 15:44
 */

namespace AppBundle\Form;

use AppBundle\Entity\RechercheJoueur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class RechercheJoueurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,[
                'required' => false,
                ])
            ->add('prenom', TextType::class,[
                'required' => false,
                ])
            ->add('club', TextType::class, [
                'required' => false,
            ])
            ->add('Rechercher',SubmitType::class);
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RechercheJoueur::class,
            'method' => "GET",
            'csrf_protection' => false
        ]);
    }

}

