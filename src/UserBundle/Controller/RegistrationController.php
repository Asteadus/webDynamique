<?php
/**
 * Created by PhpStorm.
 * User: aymer
 * Date: 31-01-19
 * Time: 11:17
 */

namespace UserBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class RegistrationController extends Controller
{

// route qui permet d'arriver à la création de compte
    /**
     * @Route("/register",name="register")
     */
    public function registerAction(Request $request)
    {

    }


}