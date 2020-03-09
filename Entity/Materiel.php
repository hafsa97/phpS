<?php

namespace App\Entity;

use DateTime;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaterielRepository")
 * @UniqueEntity(fields={"nom" , "laboratoire"}, message="Ce nom est déjà utilisé dans ce laboratoire.")
 * @ORM\HasLifecycleCallbacks()
 */
class Materiel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     *
     * @Assert\NotBlank(message="Veuillez fournir un nom.")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeMateriel")
     * @ORM\JoinColumn(nullable=false)
     *
     * @Assert\NotBlank(message="Veuillez choisir un type.")
     */
    private $typeMateriel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CriticiteMateriel")
     * @ORM\JoinColumn(nullable=false)
     *
     * @Assert\NotBlank(message="Veuillez choisir une criticité.")
     */
    private $criticiteMateriel;

    /**
     * @ORM\Column(type="date", nullable=true)
     *
     * @Assert\NotBlank(message="Veuillez fournir la date de mise en service.")
     */
    private $dateMiseEnService;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StatutMateriel")
     * @ORM\JoinColumn(nullable=false)
     *
     * @Assert\NotBlank(message="Veuillez choisir un statut.")
     */
    private $statutMateriel;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Veuillez fournir un numéro de série.")
     */
    private $numeroDeSerie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fournisseur")
     *
     * @Assert\NotBlank(message="Veuillez choisir un fournisseur.")
     */
    private $fournisseur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ContactFournisseur")
     */
    private $contactFournisseur;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $numeroContratMaintenance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Paillasse")
     * @ORM\JoinColumn(nullable=true)
     */
    private $paillasse;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Analyse")
     *
     * @Assert\Collection()
     */
    private $analysesAssociees;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false, name="user_id")
     */
    private $creePar;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=true, name="derniere_modif_par")
     */
    private $derniereModificationPar;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PieceJointe", mappedBy="materiel", cascade={"persist","remove"})
     *
     * @Assert\Valid
     */
    private $piecesJointes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="materielsHabilites")
     * @ORM\JoinTable(name="user_habilitation_utilisation")
     *
     * @Assert\Collection()
     * @Assert\Count(min = 1, minMessage="Veuillez sélectionner au moins un utilisateur.")
     */
    private $utilisateursHabilitesUtilisation;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="materielsAjoutMaintenances")
     * @ORM\JoinTable(name="user_ajout_maintenances")
     *
     * @Assert\Collection()
     */
    private $utilisateursAjoutMaintenances;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="materielsMaj")
     * @ORM\JoinTable(name="user_maj_materiel")
     *
     * @Assert\Collection()
     * @Assert\Count(min = 1, minMessage="Veuillez sélectionner au moins un utilisateur.")
     */
    private $utilisateursMaj;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="materielsRealisationMaintenances")
     * @ORM\JoinTable(name="user_realisation_materiel")
     */
    private $utilisateursRealisationMaintenances;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\TacheMaintenance", inversedBy="materielsConcernes", cascade={"persist"})
     */
    private $tachesMaintenances;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreation;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateModification;

    /**
     * @ORM\Column(type="integer")
     */
    private $version;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\HistoriqueMateriel", mappedBy="materiel", cascade={"persist","remove"})
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $historiqueMateriel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RealisationTacheMaintenance", mappedBy="materiel", orphanRemoval=true)
     */
    private $realisationTacheMaintenances;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Secteur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $secteur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Laboratoire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $laboratoire;

    public function __construct()
    {
        $this->analysesAssociees = new ArrayCollection();
        $this->piecesJointes = new ArrayCollection();
        $this->historiqueMateriel = new ArrayCollection();
        $this->utilisateursHabilitesUtilisation = new ArrayCollection();
        $this->utilisateursAjoutMaintenances = new ArrayCollection();
        $this->utilisateursMaj = new ArrayCollection();
        $this->tachesMaintenances = new ArrayCollection();
        $this->utilisateursRealisationMaintenances = new ArrayCollection();
        $this->realisationTacheMaintenances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getTypeMateriel(): ?TypeMateriel
    {
        return $this->typeMateriel;
    }

    public function setTypeMateriel(?TypeMateriel $typeMateriel): self
    {
        $this->typeMateriel = $typeMateriel;

        return $this;
    }

    public function getCriticiteMateriel(): ?CriticiteMateriel
    {
        return $this->criticiteMateriel;
    }

    public function setCriticiteMateriel(?CriticiteMateriel $criticiteMateriel): self
    {
        $this->criticiteMateriel = $criticiteMateriel;

        return $this;
    }

    public function getDateMiseEnService(): ?DateTimeInterface
    {
        return $this->dateMiseEnService;
    }

    public function setDateMiseEnService(?DateTimeInterface $dateMiseEnService): self
    {
        $this->dateMiseEnService = $dateMiseEnService;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getStatutMateriel(): ?StatutMateriel
    {
        return $this->statutMateriel;
    }

    public function setStatutMateriel(?StatutMateriel $statutMateriel): self
    {
        $this->statutMateriel = $statutMateriel;

        return $this;
    }

    public function getNumeroDeSerie(): ?string
    {
        return $this->numeroDeSerie;
    }

    public function setNumeroDeSerie(?string $numeroDeSerie): self
    {
        $this->numeroDeSerie = $numeroDeSerie;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): self
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getContactFournisseur(): ?ContactFournisseur
    {
        return $this->contactFournisseur;
    }

    public function setContactFournisseur(?ContactFournisseur $contactFournisseur): self
    {
        $this->contactFournisseur = $contactFournisseur;

        return $this;
    }


    public function getNumeroContratMaintenance(): ?string
    {
        return $this->numeroContratMaintenance;
    }

    public function setNumeroContratMaintenance(?string $numeroContratMaintenance): self
    {
        $this->numeroContratMaintenance = $numeroContratMaintenance;

        return $this;
    }

    public function getPaillasse(): ?Paillasse
    {
        return $this->paillasse;
    }

    public function setPaillasse(?Paillasse $paillasse): self
    {
        $this->paillasse = $paillasse;

        return $this;
    }

    public function getDerniereModificationPar(): ?User
    {
        return $this->derniereModificationPar;
    }

    public function setDerniereModificationPar(?User $derniereModificationPar): void
    {
        $this->derniereModificationPar = $derniereModificationPar;
    }

    /**
     * @return Collection|Analyse[]
     */
    public function getAnalysesAssociees(): Collection
    {
        return $this->analysesAssociees;
    }

    public function addAnalysesAssociee(Analyse $analysesAssociee): self
    {
        if (!$this->analysesAssociees->contains($analysesAssociee)) {
            $this->analysesAssociees[] = $analysesAssociee;
        }

        return $this;
    }

    public function removeAnalysesAssociee(Analyse $analysesAssociee): self
    {
        if ($this->analysesAssociees->contains($analysesAssociee)) {
            $this->analysesAssociees->removeElement($analysesAssociee);
        }

        return $this;
    }


    public function getCreePar(): ?User
    {
        return $this->creePar;
    }

    public function setCreePar(?User $creePar): self
    {
        $this->creePar = $creePar;

        return $this;
    }

    /**
     * @return Collection|PieceJointe[]
     */
    public function getPiecesJointes(): Collection
    {
        return $this->piecesJointes;
    }

    public function addPiecesJointe(PieceJointe $piecesJointe): self
    {
        if (!$this->piecesJointes->contains($piecesJointe)) {
            $this->piecesJointes[] = $piecesJointe;
            $piecesJointe->setMateriel($this);
        }

        return $this;
    }

    public function removePiecesJointe(PieceJointe $piecesJointe): self
    {
        if ($this->piecesJointes->contains($piecesJointe)) {
            $this->piecesJointes->removeElement($piecesJointe);
            // set the owning side to null (unless already changed)
            if ($piecesJointe->getMateriel() === $this) {
                $piecesJointe->setMateriel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUtilisateursHabilitesUtilisation(): Collection
    {
        return $this->utilisateursHabilitesUtilisation;
    }

    public function addUtilisateursHabilitesUtilisation(User $utilisateursHabilitesUtilisation): self
    {
        if (!$this->utilisateursHabilitesUtilisation->contains($utilisateursHabilitesUtilisation)) {
            $this->utilisateursHabilitesUtilisation[] = $utilisateursHabilitesUtilisation;
        }

        return $this;
    }

    public function removeUtilisateursHabilitesUtilisation(User $utilisateursHabilitesUtilisation): self
    {
        if ($this->utilisateursHabilitesUtilisation->contains($utilisateursHabilitesUtilisation)) {
            $this->utilisateursHabilitesUtilisation->removeElement($utilisateursHabilitesUtilisation);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUtilisateursAjoutMaintenances(): Collection
    {
        return $this->utilisateursAjoutMaintenances;
    }

    public function addUtilisateursAjoutMaintenance(User $utilisateursAjoutMaintenance): self
    {
        if (!$this->utilisateursAjoutMaintenances->contains($utilisateursAjoutMaintenance)) {
            $this->utilisateursAjoutMaintenances[] = $utilisateursAjoutMaintenance;
        }

        return $this;
    }

    public function removeUtilisateursAjoutMaintenance(User $utilisateursAjoutMaintenance): self
    {
        if ($this->utilisateursAjoutMaintenances->contains($utilisateursAjoutMaintenance)) {
            $this->utilisateursAjoutMaintenances->removeElement($utilisateursAjoutMaintenance);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUtilisateursMaj(): Collection
    {
        return $this->utilisateursMaj;
    }

    public function addUtilisateursMaj(User $utilisateursMaj): self
    {
        if (!$this->utilisateursMaj->contains($utilisateursMaj)) {
            $this->utilisateursMaj[] = $utilisateursMaj;
        }

        return $this;
    }

    public function removeUtilisateursMaj(User $utilisateursMaj): self
    {
        if ($this->utilisateursMaj->contains($utilisateursMaj)) {
            $this->utilisateursMaj->removeElement($utilisateursMaj);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUtilisateursRealisationMaintenances(): Collection
    {
        return $this->utilisateursRealisationMaintenances;
    }

    public function addUtilisateursRealisationMaintenance(User $utilisateursRealisationMaintenance): self
    {
        if (!$this->utilisateursRealisationMaintenances->contains($utilisateursRealisationMaintenance)) {
            $this->utilisateursRealisationMaintenances[] = $utilisateursRealisationMaintenance;
        }

        return $this;
    }

    public function removeUtilisateursRealisationMaintenance(User $utilisateursRealisationMaintenance): self
    {
        if ($this->utilisateursRealisationMaintenances->contains($utilisateursRealisationMaintenance)) {
            $this->utilisateursRealisationMaintenances->removeElement($utilisateursRealisationMaintenance);
        }

        return $this;
    }

    /**
     * @return Collection|TacheMaintenance[]
     */
    public function getTachesMaintenances(): Collection
    {
        return $this->tachesMaintenances;
    }

    public function addTachesMaintenance(TacheMaintenance $tachesMaintenance): self
    {
        if (!$this->tachesMaintenances->contains($tachesMaintenance)) {
            $this->tachesMaintenances[] = $tachesMaintenance;
            // pour éviter les erreurs de validation lors de l'ajout d'une tâche au sein de l'ajout d'un matériel sans avoir séléctionner de 'matériels concernés'
            $tachesMaintenance->addMaterielsConcerne($this);
        }

        return $this;
    }

    public function removeTachesMaintenance(TacheMaintenance $tachesMaintenance): self
    {
        if ($this->tachesMaintenances->contains($tachesMaintenance)) {
            $this->tachesMaintenances->removeElement($tachesMaintenance);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getDateCreation(): ?DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?DateTimeInterface $dateCreation): self
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    public function getDateModification(): ?DateTimeInterface
    {
        return $this->dateModification;
    }

    public function setDateModification(?DateTimeInterface $dateModification): self
    {
        $this->dateModification = $dateModification;

        return $this;
    }

    public function getVersion(): ?int
    {
        return $this->version;
    }

    public function setVersion(?int $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     *  @return Collection|HistoriqueMateriel[]
     */
    public function getHistoriqueMateriel()
    {
        return $this->historiqueMateriel;
    }

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist(): void
    {
        $this->dateCreation = new DateTime();
        $this->version = 0;
    }

    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate(): void
    {
        $this->dateModification = new DateTime();
    }

    public function addHistoriqueMateriel(HistoriqueMateriel $historiqueMateriel): self
    {
        if (!$this->historiqueMateriel->contains($historiqueMateriel)) {
            $this->historiqueMateriel[] = $historiqueMateriel;
            $historiqueMateriel->setMateriel($this);
        }

        return $this;
    }

    public function removeHistoriqueMateriel(HistoriqueMateriel $historiqueMateriel): self
    {
        if ($this->historiqueMateriel->contains($historiqueMateriel)) {
            $this->historiqueMateriel->removeElement($historiqueMateriel);
            // set the owning side to null (unless already changed)
            if ($historiqueMateriel->getMateriel() === $this) {
                $historiqueMateriel->setMateriel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|RealisationTacheMaintenance[]
     */
    public function getRealisationTacheMaintenances(): Collection
    {
        return $this->realisationTacheMaintenances;
    }

    public function addRealisationTacheMaintenance(RealisationTacheMaintenance $realisationTacheMaintenance): self
    {
        if (!$this->realisationTacheMaintenances->contains($realisationTacheMaintenance)) {
            $this->realisationTacheMaintenances[] = $realisationTacheMaintenance;
            $realisationTacheMaintenance->setMateriel($this);
        }

        return $this;
    }

    public function removeRealisationTacheMaintenance(RealisationTacheMaintenance $realisationTacheMaintenance): self
    {
        if ($this->realisationTacheMaintenances->contains($realisationTacheMaintenance)) {
            $this->realisationTacheMaintenances->removeElement($realisationTacheMaintenance);
            // set the owning side to null (unless already changed)
            if ($realisationTacheMaintenance->getMateriel() === $this) {
                $realisationTacheMaintenance->setMateriel(null);
            }
        }

        return $this;
    }

    public function getSecteur(): ?Secteur
    {
        return $this->secteur;
    }

    public function setSecteur(?Secteur $secteur): self
    {
        $this->secteur = $secteur;

        return $this;
    }

    public function getLaboratoire(): ?Laboratoire
    {
        return $this->laboratoire;
    }

    public function setLaboratoire(?Laboratoire $laboratoire): self
    {
        $this->laboratoire = $laboratoire;

        return $this;
    }
}
