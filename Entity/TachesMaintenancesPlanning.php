<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TachesMaintenancesPlanningRepository")
 */
class TachesMaintenancesPlanning
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TacheMaintenance")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tacheMaintenance;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Materiel")
     */
    private $materiel;

    /**
     * @ORM\Column(type="date")
     */
    private $DatePlanification;

    public function __construct()
    {
        $this->materiel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|Materiel[]
     */
    public function getMateriel(): Collection
    {
        return $this->materiel;
    }

    public function addMateriel(Materiel $materiel): self
    {
        if (!$this->materiel->contains($materiel)) {
            $this->materiel[] = $materiel;
        }

        return $this;
    }

    /**
     * @param mixed $materiel
     */
    public function setMateriel($materiel): void
    {
        $this->materiel = $materiel;
    }

    public function removeMateriel(Materiel $materiel): self
    {
        if ($this->materiel->contains($materiel)) {
            $this->materiel->removeElement($materiel);
        }

        return $this;
    }

    public function getDatePlanification(): ?\DateTimeInterface
    {
        return $this->DatePlanification;
    }

    public function setDatePlanification(\DateTimeInterface $DatePlanification): self
    {
        $this->DatePlanification = $DatePlanification;

        return $this;
    }
}
