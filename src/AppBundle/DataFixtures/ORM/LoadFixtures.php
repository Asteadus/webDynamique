<?php
/**
 * Created by PhpStorm.
 * User: aymer
 * Date: 10-01-19
 * Time: 12:23
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Joueur;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadFixtures implements FixtureInterface
{
    public function load (ObjectManager $manager){
        $joueur = new Joueur();
        $joueur -> setNom("Deschacht");
        $joueur -> setPrenom("Olivier");
        $joueur -> setPied("gauche");
        $joueur -> setTaille("183");
        $joueur ->setDateNaissance(\DateTime::createFromFormat("d-m-Y", "12-02-1981" ));


        $manager -> persist($joueur);
        $manager -> flush();
    }

}