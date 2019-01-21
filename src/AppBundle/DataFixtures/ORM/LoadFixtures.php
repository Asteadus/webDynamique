<?php
/**
 * Created by PhpStorm.
 * User: aymer
 * Date: 10-01-19
 * Time: 12:23
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Joueur;
use AppBundle\Entity\Position;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadFixtures implements FixtureInterface
{
    public function load (ObjectManager $manager){

    }

}