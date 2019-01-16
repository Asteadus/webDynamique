<?php

namespace AppBundle\Controller;

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
    public function clubAction(Request $request)
    {
        return $this->render('default/listeClubs.html.twig'  );
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function inscriptionAction(Request $request)
    {
        return $this->render('default/inscription.html.twig');

    }
    /**
     * @Route("/joueurs", name="joueurs")
     */
    public function joueursAction(Request $request)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Joueur');
        $listJoueurs = $repository->myFindAll();
        foreach ($listJoueurs as $joueur){
            echo $joueur->getContent();
        }
        return $this->render('default/listeJoueurs.html.twig', ["listJoueurs"=>$this->getContent()]);
    }
    /**
     * @Route("/recherche", name="recherche")
     */
    public function rechercheAction(Request $request)
    {
        return $this->render('default/recherche.html.twig'  );
    }
    /**
     * @Route("/crud", name="crud")
     */
    public function adminCrud(Request $request)
    {
        return $this->render('admin/crud.html.twig'  );
    }

}
