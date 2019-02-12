<?php
/**
 * Created by PhpStorm.
 * User: aymer
 * Date: 26-01-19
 * Time: 19:09
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class JoueurEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

    }

    public function getParent()
    {
        return JoueurType::class;
    }
}
