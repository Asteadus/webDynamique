<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClubRepository")
 */
class Club
{
    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Image", cascade={"persist"})
     */
    private $image;

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }


    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Entraineur", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $entraineur;

    /**
     * @return mixed
     */
    public function getEntraineur()
    {
        return $this->entraineur;
    }

    /**
     * @param mixed $entraineur
     */
    public function setEntraineur($entraineur)
    {
        $this->entraineur = $entraineur;
    }

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
     * @ORM\Column(name="nom", type="string", length=255, unique=true)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="date")
     */
    private $dateCreation;

    /**
     * @var string
     *
     * @ORM\Column(name="stade", type="string", length=255)
     */
    private $stade;

    /**
     * @var string
     *
     * @ORM\Column(name="site_officiel", type="string", length=255)
     * @Assert\Length(max=255)
     * @Assert\Url()
     */
    private $siteOfficiel;


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
     * @return Club
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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Club
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set stade
     *
     * @param string $stade
     *
     * @return Club
     */
    public function setStade($stade)
    {
        $this->stade = $stade;

        return $this;
    }

    /**
     * Get stade
     *
     * @return string
     */
    public function getStade()
    {
        return $this->stade;
    }

    /**
     * Set siteOfficiel
     *
     * @param string $siteOfficiel
     *
     * @return Club
     */
    public function setSiteOfficiel($siteOfficiel)
    {
        $this->siteOfficiel = $siteOfficiel;

        return $this;
    }

    /**
     * Get siteOfficiel
     *
     * @return string
     */
    public function getSiteOfficiel()
    {
        return $this->siteOfficiel;
    }


}
