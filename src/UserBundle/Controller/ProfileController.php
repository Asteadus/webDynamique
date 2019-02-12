<?php
/**
 * Created by PhpStorm.
 * User: aymer
 * Date: 06-02-19
 * Time: 19:15
 */

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;




class ProfileController extends controller
{

// route du qui sert pour l'affichage du profil d'un utilisateur
    /**
     * @Route("/profile",name="profile")
     */
    public function profilAction()
    {

    }

// route du qui sert pour l'affichage du profil d'un utilisateur en fonction de son id
    /**
     * @Route("/userprofil/{id}",name="userprofil")
     */
    public function ProfileUsersAction($id, Request $request){
        $em =$this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->find($id);

        return $this->render('UserBundle:Profile:show.html.twig', ["user" => $user]);

    }

}