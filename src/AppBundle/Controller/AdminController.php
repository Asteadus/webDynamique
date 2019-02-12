<?php
/**
 * Created by PhpStorm.
 * User: aymer
 * Date: 17-01-19
 * Time: 11:24
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Club;
use AppBundle\Entity\Entraineur;
use AppBundle\Entity\Joueur;
use AppBundle\Entity\Position;
use AppBundle\Form\ClubEditType;
use AppBundle\Form\ClubType;
use AppBundle\Form\EntraineurType;
use AppBundle\Form\JoueurEditType;
use AppBundle\Form\JoueurType;
use AppBundle\Form\PositionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends Controller
{
//Permet de créer la route admin qui permet de faire la liste des possibilités d'un admin
    /**
     * @Route("/admin", name="admin")
     */
    public function indexAction(Request $request)
    {
        return $this->render('admin/admin.html.twig'  );
    }

// ***** JOUEUR *****

//Fonction qui permet l'ajout d'un joueur
    /**
     * @Route("/addjoueurs", name="addjoueurs")
     */
    public function addJoueur(Request $request){

        $joueur = new Joueur();
        $form = $this->createForm(JoueurType::class,$joueur);
        if ($form->handleRequest($request)->isValid()){
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($joueur);
            $em->flush();
            $this->get('session')->getFlashBag()->add("form.success","Bien ouéj gros");
            return $this->redirectToRoute("addjoueurs");
        }
        return $this->render('admin/addJoueur.html.twig', array('form' => $form->createView()));
    }

//Fonction qui permet d'éditer un joueur
    /**
     * @Route("/editjoueur/{id}", name="editjoueur")
     */
    public function editJoueur(Request $request, $id){

        $em =$this->getDoctrine()->getManager();
        $joueur = $em->getRepository('AppBundle:Joueur')->find($id);

        if (null === $joueur) {
            return $this->redirectToRoute("joueurs");
        }
        $form = $this->get('form.factory')->create(JoueurEditType::class, $joueur);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');
            return $this->redirectToRoute('joueur', array('id' => $joueur->getId()));
        }
        return $this->render('admin/editJoueur.html.twig', array(
            'joueur' => $joueur,
            'form'   => $form->createView(),
        ));
    }

//Fonction qui permet de supprimer un joueur
    /**
     * @Route("/deletejoueur/{id}", name="deletejoueur")
     */
    public function deleteJoueur(Request $request, $id){

        $em =$this->getDoctrine()->getManager();
        $joueur = $em->getRepository('AppBundle:Joueur')->find($id);
        if (null === $joueur) {
            return $this->redirectToRoute("joueurs");
        }
        $em->remove($joueur);
        $em->flush();
        return $this->redirectToRoute("joueurs");
    }

// ***** Entraineur ******

//Fonction qui permet d'ajouter un entraineur
    /**
    * @Route("/addentraineurs", name="addentraineurs")
    */
    public function addEntraineur(Request $request)
    {
        $entraineur = new Entraineur();
        $form = $this->createForm(EntraineurType::class, $entraineur);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($entraineur);
            $em->flush();
            $this->get('session')->getFlashBag()->add("form.success", "Bien ouéj gros");
            return $this->redirectToRoute("addentraineurs");
        }
        return $this->render('admin/addEntraineur.html.twig', array('form' => $form->createView()));
    }


// ***** Club ******

//Fonction qui permet d'ajouter un club
    /**
     * @Route("/addclubs", name="addclubs")
     */
    public function addClubs(Request $request)
    {
        $clubs = new Club();
        $form = $this->createForm(ClubType::class, $clubs);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($clubs);
            $em->flush();
            $this->get('session')->getFlashBag()->add("form.success", "Bien ouéj gros");
            return $this->redirectToRoute("addclubs");
        }
        return $this->render('admin/addClubs.html.twig', array('form' => $form->createView()));
    }

//Fonction qui permet d'éditer un club
    /**
     * @Route("/editclub/{id}", name="editclub")
     */
    public function editClub($id, Request $request){

        $em =$this->getDoctrine()->getManager();
        $club = $em->getRepository('AppBundle:Club')->find($id);
        if (null === $club) {
            return $this->redirectToRoute("clubs");
        }
        $form = $this->get('form.factory')->create(ClubEditType::class, $club);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em->flush();
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');
            return $this->redirectToRoute('club', array('id' => $club->getId()));
        }
        return $this->render('admin/editClub.html.twig', array(
            'club' => $club,
            'form'   => $form->createView(),
        ));

    }
// Fonction qui permet de supprimer un club
    /**
     * @Route("/deleteclub/{id}", name="deleteclub")
     */
    public function deleteClub(Request $request, $id){

        $em =$this->getDoctrine()->getManager();
        $club = $em->getRepository('AppBundle:Club')->find($id);

        if (null === $club) {
            return $this->redirectToRoute("clubs");
        }

        $em->remove($club);
        $em->flush();

        return $this->redirectToRoute("clubs");

    }
//***** Positions *****

//Fonction qui permet d'ajouter une position
    /**
     * @Route("/addpositions", name="addpositions")
     */
    public function addPositions(Request $request)
    {
        $positions = new Position();
        $form = $this->createForm(PositionType::class, $positions);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($positions);
            $em->flush();
            $this->get('session')->getFlashBag()->add("form.success", "Bien ouéj gros");
            return $this->redirectToRoute("addpositions");
        }

        return $this->render('admin/addPositions.html.twig', array('form' => $form->createView()));
    }

//***** Utilisateurs *****

//Fonction qui permet de récupérer tous les utilisateurs
    /**
     * @Route("/users", name="users")
     */
    public function usersListAction(Request $request)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('UserBundle:User');
        $listUsers = $repository->findAll();

        return $this->render('admin/userList.html.twig', ["listUsers"=>$listUsers]);

    }
//Fonction qui permet de bannir un utilisateur
    /**
     * @Route("/banuser/{id}",name="banuser")
     */
    public function BanUser ($id, Request $request){
        $em =$this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->find($id);
        //enabled permet de bannir un compte
        $user->setEnabled(false);
        $em->flush();

        return $this->redirectToRoute("users");
    }


//Fonction qui permet de supprimer un commentaire
    /**
     * @Route("/deletecommentaire/{id}", name="deletecommentaire")
     */
    public function deleteCommentaire($id, Request $request){

        $em =$this->getDoctrine()->getManager();
        $commentaire = $em->getRepository('AppBundle:Commentaire')->find($id);

        // permet de rediriger sur la page du joueur actuel
        if (null === $commentaire) {
            return $this->redirectToRoute('joueur', array('id' => $commentaire->getJoueur()->getId()));
        }
        $em->remove($commentaire);
        $em->flush();
        return $this->redirectToRoute('joueur', array('id' => $commentaire->getJoueur()->getId()));
    }


}