<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HistoriqueMaterielRepository")
 */
class HistoriqueMateriel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $version;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Materiel", inversedBy="historiqueMateriel")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $materiel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="date",nullable=true)
     */
    private $dateMiseEnService;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $numeroDeSerie;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $numeroContratMaintenance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeMateriel")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $typeMateriel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CriticiteMateriel")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $criticiteMateriel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StatutMateriel")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $statutMateriel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fournisseur")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $fournisseur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ContactFournisseur")
     * @ORM\JoinColumn(nullable=true)
     *
     */
    private $contactFournisseur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Paillasse")
     * @ORM\JoinColumn(nullable=true)
     *
     */
    private $paillasse;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=true)
     *
     */
    private $user;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateModification;

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user): void
    {
        $this->user = $user;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVersion(): ?int
    {
        return $this->version;
    }

    public function setVersion(int $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getMateriel(): ?int
    {
        return $this->materiel;
    }

    public function setMateriel(Materiel $materiel): self
    {
        $this->materiel = $materiel;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDateMiseEnService(): ?DateTimeInterface
    {
        return $this->dateMiseEnService;
    }

    public function setDateMiseEnService(DateTimeInterface $dateMiseEnService): self
    {
        $this->dateMiseEnService = $dateMiseEnService;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getNumeroDeSerie(): ?string
    {
        return $this->numeroDeSerie;
    }

    public function setNumeroDeSerie(string $numeroDeSerie): self
    {
        $this->numeroDeSerie = $numeroDeSerie;

        return $this;
    }

    public function getNumeroContratMaintenance(): ?string
    {
        return $this->numeroContratMaintenance;
    }

    public function setNumeroContratMaintenance(string $numeroContratMaintenance): self
    {
        $this->numeroContratMaintenance = $numeroContratMaintenance;

        return $this;
    }

    public function getTypeMateriel(): ?TypeMateriel
    {
        return $this->typeMateriel;
    }

    public function setTypeMateriel(int $typeMateriel): self
    {
        $this->typeMateriel = $typeMateriel;

        return $this;
    }

    public function getCriticiteMateriel(): ?CriticiteMateriel
    {
        return $this->criticiteMateriel;
    }

    public function setCriticiteMateriel(int $criticiteMateriel): self
    {
        $this->criticiteMateriel = $criticiteMateriel;

        return $this;
    }

    public function getStatutMateriel(): ?StatutMateriel
    {
        return $this->statutMateriel;
    }

    public function setStatutMateriel(int $statutMateriel): self
    {
        $this->statutMateriel = $statutMateriel;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(int $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getContactFournisseur(): ?ContactFournisseur
    {
        return $this->contactFournisseur;
    }

    public function setContactFournisseur(?int $contactFournisseur): self
    {
        $this->contactFournisseur = $contactFournisseur;

        return $this;
    }

    public function getPaillasse(): ?Paillasse
    {
        return $this->paillasse;
    }

    public function setPaillasse(int $paillasse): self
    {
        $this->paillasse = $paillasse;

        return $this;
    }

    public function getDateModification(): ?DateTimeInterface
    {
        return $this->dateModification;
    }

    public function setDateModification(DateTimeInterface $dateModification): self
    {
        $this->dateModification = $dateModification;

        return $this;
    }

}
