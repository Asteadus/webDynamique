<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Club;
use AppBundle\Entity\Commentaire;
use AppBundle\Entity\Joueur;
use AppBundle\Entity\RechercheJoueur;
use AppBundle\Form\CommentaireType;
use AppBundle\Form\PostType;
use AppBundle\Form\RechercheJoueurType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use UserBundle\Entity\User;


class DefaultController extends Controller
{
//***** Route de base ******

//Permet de créer la route pour le homepage
        /**
         * @Route("/", name="homepage")
         */
        public function indexAction(Request $request)
        {
            return $this->render('default/index.html.twig'  );
        }
//***** Route en rapport avec les clubs *****

//Permet de renvoyer la liste des clubs à la twig listeclubs
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

// Permet de renvoyer le club à la vue club en fonction de l'id
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
    public function joueurAction(User $user,Joueur $joueur, Request $request)

    {


        $commentaire = new Commentaire();

        $form = $this->createForm(CommentaireType::class,$commentaire);
        if ($form->handleRequest($request)->isValid()){
            $commentaire -> setJoueur($joueur);
            $commentaire -> setUser($this->getUser());
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($commentaire);
            $em->flush();
            $this->get('session')->getFlashBag()->add("form.success","Bien ouéj gros");

        }
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Commentaire');
        $messages = $repository->findBy(array(),array('id'=> 'ASC'));


        return $this->render('default/joueur.html.twig', ["joueur" => $joueur, "messages"=>$messages, 'form' => $form->createView(),
            'username' =>$this->getUser()] );
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



}
