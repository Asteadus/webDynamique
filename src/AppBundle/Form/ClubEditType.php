<?php
/**
 * Created by PhpStorm.
 * User: aymer
 * Date: 27-01-19
 * Time: 01:37
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ClubEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

    }

    public function getParent()
    {
        return ClubType::class;
    }
}