<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Joueur
 *
 * @ORM\Table(name="joueur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JoueurRepository")
 */
class Joueur
{


    /**
     * @ORM\OneToOne(targetEntity="Appbundle\Entity\Image", cascade={"persist"})
     */
    private $image;


    /**
     * @ORM\OneToOne(targetEntity="Appbundle\Entity\Nationnalite", cascade={"persist"})
     */
    private $nationnalite;

    /**
     * @ORM\ManyToMany(targetEntity="Appbundle\Entity\Position", cascade={"persist"})
     */
    private $positions;

    /**
     * @ORM\ManyToOne(targetEntity="Appbundle\Entity\Club", cascade={"persist"})
     */
    private $club;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_naissance", type="date")
     */
    private $dateNaissance;

    /**
     * @var int
     *
     * @ORM\Column(name="taille", type="smallint")
     */
    private $taille;

    /**
     * @var string
     *
     * @ORM\Column(name="pied", type="string", length=255)
     */
    private $pied;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Joueur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Joueur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Joueur
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set taille
     *
     * @param integer $taille
     *
     * @return Joueur
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return int
     */
    public function getTaille()
    {
        return $this->taille;
    }

    /**
     * Set pied
     *
     * @param string $pied
     *
     * @return Joueur
     */
    public function setPied($pied)
    {
        $this->pied = $pied;

        return $this;
    }

    /**
     * Get pied
     *
     * @return string
     */
    public function getPied()
    {
        return $this->pied;
    }
}

