<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Club;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
Use AppBundle\Entity\Joueur;
Use AppBundle\Repository\JoueurRepository;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig'  );
    }

    /**
     * @Route("/clubs", name="clubs")
     */
    public function clubsAction(Request $request)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Club', 'AppBundle:Image');
        $listClubs = $repository->findAll();

        return $this->render('default/listeClubs.html.twig', ["listClubs"=>$listClubs]);

    }

    /**
     * @Route("/club/{id}", name="club")
     */
    public function clubAction(Club $club)
    {

        return $this->render('default/club.html.twig', ["club" => $club]);
    }


    /**
     * @Route("/joueurs ", name="joueurs")
     */
    public function joueursAction(Request $request)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Joueur', 'AppBundle:Image');
        $listJoueurs = $repository->findAll();

        return $this->render('default/listeJoueurs.html.twig', ["listJoueurs"=>$listJoueurs]);
    }

    /**
     * @Route("/joueur/{id}", name="joueur")
     */
    public function joueurAction(Joueur $joueur)
    {

        return $this->render('default/joueur.html.twig', ["joueur" => $joueur]);
    }

    /**
     * @Route("/recherche", name="recherche")
     */
    public function rechercheAction(Request $request)
    {
        return $this->render('default/recherche.html.twig'  );
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscriptionAction(Request $request)
    {
        return $this->render('default/inscription.html.twig');

    }

    /**
     * @Route("/crud", name="crud")
     */
    public function adminCrud(Request $request)
    {
        return $this->render('admin/crud.html.twig'  );
    }

}
