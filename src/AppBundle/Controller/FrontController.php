<?php
/**
 * Created by PhpStorm.
 * User: aymer
 * Date: 07-01-19
 * Time: 11:01
 */

namespace AppBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class FrontController extends DefaultController
{

    /**
     * @Route("/joueur", name="joueur")
     */
    public function rechercheJoueur(Request $request)
    {
        return $this->render('default/joueur.html.twig'  );
    }
}