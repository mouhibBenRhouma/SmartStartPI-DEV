<?php

namespace AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Agenda
 *
 * @ORM\Table(name="agenda", indexes={@ORM\Index(name="idProjet", columns={"idProjet"}), @ORM\Index(name="idFonctionnalite", columns={"idFonctionnalite"})})
 * @ORM\Entity
 */
class Agenda
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateDebut", type="date", nullable=false)
     */
    private $datedebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateFin", type="date", nullable=false)
     */
    private $datefin;

    /**
     * @var \Projet
     *
     * @ORM\ManyToOne(targetEntity="Projet")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProjet", referencedColumnName="id")
     * })
     */
    private $idprojet;

    /**
     * @var \Fonctionnalites
     *
     * @ORM\ManyToOne(targetEntity="Fonctionnalites")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFonctionnalite", referencedColumnName="id")
     * })
     */
    private $idfonctionnalite;





    /**
     * Get id
     *
     * @return integer
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
     * @return Agenda
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
     * Set type
     *
     * @param string $type
     *
     * @return Agenda
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     *
     * @return Agenda
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     *
     * @return Agenda
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set idprojet
     *
     * @param \AgendaBundle\Entity\Projet $idprojet
     *
     * @return Agenda
     */
    public function setIdprojet(\AgendaBundle\Entity\Projet $idprojet = null)
    {
        $this->idprojet = $idprojet;

        return $this;
    }

    /**
     * Get idprojet
     *
     * @return \AgendaBundle\Entity\Projet
     */
    public function getIdprojet()
    {
        return $this->idprojet;
    }

    /**
     * Set idfonctionnalite
     *
     * @param \AgendaBundle\Entity\Fonctionnalites $idfonctionnalite
     *
     * @return Agenda
     */
    public function setIdfonctionnalite(\AgendaBundle\Entity\Fonctionnalites $idfonctionnalite = null)
    {
        $this->idfonctionnalite = $idfonctionnalite;

        return $this;
    }

    /**
     * Get idfonctionnalite
     *
     * @return \AgendaBundle\Entity\Fonctionnalites
     */
    public function getIdfonctionnalite()
    {
        return $this->idfonctionnalite;
    }
}
