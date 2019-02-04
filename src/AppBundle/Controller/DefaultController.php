<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Club;
use AppBundle\Entity\Commentaire;
use AppBundle\Entity\RechercheJoueur;
use AppBundle\Form\CommentaireType;
use AppBundle\Form\RechercheJoueurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
Use AppBundle\Entity\Joueur;
use AppBundle\Form\JoueurType;
Use AppBundle\Repository\JoueurRepository;
use AppBundle\Form\PostType;



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
    public function joueurAction(Joueur $joueur, Request $request)

    {


        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class,$commentaire);
        if ($form->handleRequest($request)->isValid()){
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($commentaire);
            $em->flush();
            $this->get('session')->getFlashBag()->add("form.success","Bien ouéj gros");

        }

        return $this->render('default/joueur.html.twig', ["joueur" => $joueur, 'form' => $form->createView()] );
    }

    /**
     * @Route("/recherche", name="recherche")
     */
    public function rechercheAction(Request $request)
    {

        $recherche = new RechercheJoueur();
        $form = $this->createForm(RechercheJoueurType::class,$recherche);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository(Joueur::class);
            $listRecherches = $repository->findJoueur($recherche);

            return $this->render('default/rechercheList.html.twig', ["listRecherche"=>$listRecherches]);
        }


        return $this->render('default/recherche.html.twig', array('form' => $form->createView()));

    }

    /**
     * @Route("/rechercheList", name="rechercheList")
     */
    public function rechercheList(Request $request)
    {
        return $this->render('default/rechercheList.html.twig');

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
