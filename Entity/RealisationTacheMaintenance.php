<?php

namespace App\Entity;

use App\Utils\Traits\Timestampable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RealisationTacheMaintenanceRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class RealisationTacheMaintenance
{
    use Timestampable;

    public static $statut_en_attente = "En attente";
    public static $statut_affectee = "Affectée";
    public static $statut_en_cours = "En cours";
    public static $statut_realisee = "Réalisée";
    public static $statut_non_realisee = "Non réalisée";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;



    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $statut;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $rapportRealisation;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pieceJointe;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateRealisation;

    /**
     * @ORM\Column(type="date")
     */
    private $datePlanification;

    /**
     * @ORM\Column(type="date")
     */
    private $dateEcheance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TacheMaintenance", inversedBy="realisationTacheMaintenances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tacheMaintenance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Materiel", inversedBy="realisationTacheMaintenances")
     * @ORM\JoinColumn(nullable=false)
     */
    private $materiel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="realisationTacheMaintenances")
     */
    private $realisateur;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateAffectation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\NotificationRealisation", mappedBy="realisation")
     */
    private $notifications;

    public function __construct()
    {
        $this->notifications = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(?string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getRapportRealisation(): ?string
    {
        return $this->rapportRealisation;
    }

    public function setRapportRealisation(?string $rapportRealisation): self
    {
        $this->rapportRealisation = $rapportRealisation;

        return $this;
    }

    public function getDateRealisation(): ?\DateTimeInterface
    {
        return $this->dateRealisation;
    }

    public function setDateRealisation(?\DateTimeInterface $dateRealisation): self
    {
        $this->dateRealisation = $dateRealisation;

        return $this;
    }

    public function getDatePlanification(): ?\DateTimeInterface
    {
        return $this->datePlanification;
    }

    public function setDatePlanification(\DateTimeInterface $datePlanification): self
    {
        $this->datePlanification = $datePlanification;

        return $this;
    }

    public function getDateEcheance(): ?\DateTimeInterface
    {
        return $this->dateEcheance;
    }

    public function setDateEcheance(\DateTimeInterface $dateEcheance): self
    {
        $this->dateEcheance = $dateEcheance;

        return $this;
    }

    public function getTacheMaintenance(): ?TacheMaintenance
    {
        return $this->tacheMaintenance;
    }

    public function setTacheMaintenance(?TacheMaintenance $tacheMaintenance): self
    {
        $this->tacheMaintenance = $tacheMaintenance;

        return $this;
    }

    public function getMateriel(): ?Materiel
    {
        return $this->materiel;
    }

    public function setMateriel(?Materiel $materiel): self
    {
        $this->materiel = $materiel;

        return $this;
    }

    public function getRealisateur(): ?User
    {
        return $this->realisateur;
    }

    public function setRealisateur(?User $realisateur): self
    {
        $this->realisateur = $realisateur;

        return $this;
    }

    public function getDateAffectation(): ?\DateTimeInterface
    {
        return $this->dateAffectation;
    }

    public function setDateAffectation(?\DateTimeInterface $dateAffectation): self
    {
        $this->dateAffectation = $dateAffectation;

        return $this;
    }
    /**
     * @return string
     */
    public function getPieceJointe(): string
    {
        return $this->pieceJointe;
    }

    /**
     * @param string $pieceJointe
     */
    public function setPieceJointe(string $pieceJointe): void
    {
        $this->pieceJointe = $pieceJointe;
    }

    /**
     * @return Collection|NotificationRealisation[]
     */
    public function getNotifications(): Collection
    {
        return $this->notifications;
    }

    public function addNotification(NotificationRealisation $notification): self
    {
        if (!$this->notifications->contains($notification)) {
            $this->notifications[] = $notification;
            $notification->setRealisation($this);
        }

        return $this;
    }

    public function removeNotification(NotificationRealisation $notification): self
    {
        if ($this->notifications->contains($notification)) {
            $this->notifications->removeElement($notification);
            // set the owning side to null (unless already changed)
            if ($notification->getRealisation() === $this) {
                $notification->setRealisation(null);
            }
        }

        return $this;
    }

}
