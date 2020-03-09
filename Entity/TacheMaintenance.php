<?php

namespace App\Entity;

use App\Entity\Planification\Planification;
use App\Entity\Planification\PlanificationParJours;
use App\Entity\Planification\PlanificationParMois;
use App\Entity\Planification\PlanificationParSemaines;
use App\Entity\Planification\PlanificationUnique;
use App\Utils\Traits\Timestampable;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TacheMaintenanceRepository")
 * @UniqueEntity(fields={"titre"}, message="Ce titre est déjà utilisé.")
 * @ORM\HasLifecycleCallbacks()
 */
class TacheMaintenance
{
    use Timestampable;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     *
     * @Assert\NotBlank(message="Veuillez fournir un nom.")
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     *
     * @Assert\NotNull(message="Veuillez choisir un statut.")
     */
    private $statut;

    /**
     * @ORM\Column(type="boolean", name="est_interne")
     *
     * @Assert\NotNull(message="Veuillez choisir un type.")
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     *
     * @Assert\NotBlank(message="Veuillez fournir une durée.")
     */
    private $dureeEnJours;

    /**
     * @ORM\Column(type="text", nullable=true)
     *
     */
    private $modeOperatoire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false, name="user_id")
     */
    private $creeePar;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Planification\Planification", cascade={"persist", "remove"}, orphanRemoval=true)
     * @ORM\JoinColumn(nullable=false)
     *
     * @Assert\Valid
     */
    private $planification;

    /**
     * @Assert\NotBlank(message="Veuillez choisir un type de planification.")
     */
    private $typePlan;

    /**
     * @Assert\Valid
     */
    private $planificationUnique;

    /**
     * @Assert\Valid
     */
    private $planificationParJours;

    /**
     * @Assert\Valid
     */
    private $planificationParSemaines;

    /**
     * @Assert\Valid
     */
    private $planificationParMois;

    /**
     * @return mixed
     */


  /**
     * @Assert\Valid
     */
    private $planificationParDemande;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PieceJointe", mappedBy="tacheMaintenance", cascade={"persist"})
     *
     * @Assert\Valid
     */
    private $piecesJointes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Materiel", mappedBy="tachesMaintenances")
     */
    private $materielsConcernes;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $prochaineExecution;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RealisationTacheMaintenance", mappedBy="tacheMaintenance", orphanRemoval=true)
     */
    private $realisationTacheMaintenances;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDernierePlanification;

    public function __construct()
    {
        $this->piecesJointes = new ArrayCollection();
        $this->materielsConcernes = new ArrayCollection();
        $this->realisationTacheMaintenances = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

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

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(?bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDureeEnJours(): ?int
    {
        return $this->dureeEnJours;
    }

    public function setDureeEnJours(?int $dureeEnJours): self
    {
        $this->dureeEnJours = $dureeEnJours;

        return $this;
    }

    public function getModeOperatoire(): ?string
    {
        return $this->modeOperatoire;
    }

    public function setModeOperatoire(?string $modeOperatoire): self
    {
        $this->modeOperatoire = $modeOperatoire;

        return $this;
    }

    public function getType(): ?bool
    {
        return $this->type;
    }

    public function setType(?bool $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCreeePar(): ?User
    {
        return $this->creeePar;
    }

    public function setCreeePar(?User $creeePar): self
    {
        $this->creeePar = $creeePar;

        return $this;
    }

    public function getPlanification(): ?Planification
    {
        return $this->planification;
    }

    public function setPlanification(?Planification $planification): self
    {
        $this->planification = $planification;

        return $this;
    }

    public function getTypePlan()
    {
        return $this->typePlan;
    }

    public function setTypePlan($typePlan): void
    {
        $this->typePlan = $typePlan;
    }

    public function getPlanificationUnique(): ?PlanificationUnique
    {
        return $this->planificationUnique;
    }

    public function setPlanificationUnique(?PlanificationUnique $planificationUnique): void
    {
        $this->planificationUnique = $planificationUnique;
    }

    public function getPlanificationParJours(): ?PlanificationParJours
    {
        return $this->planificationParJours;
    }

    public function setPlanificationParJours(?PlanificationParJours $planificationParJours): void
    {
        $this->planificationParJours = $planificationParJours;
    }

    public function getPlanificationParSemaines(): ?PlanificationParSemaines
    {
        return $this->planificationParSemaines;
    }

    public function setPlanificationParSemaines(?PlanificationParSemaines $planificationParSemaines): void
    {
        $this->planificationParSemaines = $planificationParSemaines;
    }

    public function getPlanificationParMois(): ?PlanificationParMois
    {
        return $this->planificationParMois;
    }

    public function setPlanificationParMois(?PlanificationParMois $planificationParMois): void
    {
        $this->planificationParMois = $planificationParMois;
    }

    public function getPlanificationParDemande()
    {
        return $this->planificationParDemande;
    }

    /**
     * @param mixed $planificationParDemande
     */
    public function setPlanificationParDemande($planificationParDemande): void
    {
        $this->planificationParDemande = $planificationParDemande;
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
            $piecesJointe->setTacheMaintenance($this);
        }

        return $this;
    }

    public function removePiecesJointe(PieceJointe $piecesJointe): self
    {
        if ($this->piecesJointes->contains($piecesJointe)) {
            $this->piecesJointes->removeElement($piecesJointe);
            // set the owning side to null (unless already changed)
            if ($piecesJointe->getTacheMaintenance() === $this) {
                $piecesJointe->setTacheMaintenance(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Materiel[]
     */
    public function getMaterielsConcernes(): Collection
    {
        return $this->materielsConcernes;
    }

    public function addMaterielsConcerne(Materiel $materielsConcerne): self
    {
        if (!$this->materielsConcernes->contains($materielsConcerne)) {
            $this->materielsConcernes[] = $materielsConcerne;
            $materielsConcerne->addTachesMaintenance($this);
        }

        return $this;
    }

    public function removeMaterielsConcerne(Materiel $materielsConcerne): self
    {
        if ($this->materielsConcernes->contains($materielsConcerne)) {
            $this->materielsConcernes->removeElement($materielsConcerne);
            $materielsConcerne->removeTachesMaintenance($this);
        }

        return $this;
    }

    public function getProchaineExecution(): ?DateTimeInterface
    {
        return $this->prochaineExecution;
    }

    public function setProchaineExecution( $prochaineExecution): self
    {
        $this->prochaineExecution = $prochaineExecution;

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
            $realisationTacheMaintenance->setTacheMaintenance($this);
        }

        return $this;
    }

    public function removeRealisationTacheMaintenance(RealisationTacheMaintenance $realisationTacheMaintenance): self
    {
        if ($this->realisationTacheMaintenances->contains($realisationTacheMaintenance)) {
            $this->realisationTacheMaintenances->removeElement($realisationTacheMaintenance);
            // set the owning side to null (unless already changed)
            if ($realisationTacheMaintenance->getTacheMaintenance() === $this) {
                $realisationTacheMaintenance->setTacheMaintenance(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
      return $this->titre;
    }

    public function getDateDernierePlanification(): ?DateTimeInterface
    {
        return $this->dateDernierePlanification;
    }

    public function setDateDernierePlanification(?DateTimeInterface $dateDernierePlanification): self
    {
        $this->dateDernierePlanification = $dateDernierePlanification;

        return $this;
    }
}
