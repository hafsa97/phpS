<?php

namespace App\Entity\Planification;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlanificationRepository")
 * @ORM\Table(indexes={@ORM\Index(name="type_idx", columns={"type_planification"})})
 * @ORM\InheritanceType(value="SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type_planification", type="string", length=30)
 * @ORM\DiscriminatorMap({
 *     "UNIQUE" = "PlanificationUnique",
 *     "PAR_JOURS" = "PlanificationParJours",
 *     "PAR_SEMAINES" = "PlanificationParSemaines",
 *     "PAR_MOIS" = "PlanificationParMois",
 *      "PAR_DEMANDE" = "PlanificationParDemande"
 *     })
 */
abstract class Planification
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDemarrage;

    /**
     * @ORM\Column(type="integer")
     */
    private $notifierAvant;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreDeRepetitions;

    /**
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    private $intervalleEnMinutes;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDemarrage(): ?DateTimeInterface
    {
        return $this->dateDemarrage;
    }

    public function setDateDemarrage(?DateTimeInterface $dateDemarrage): self
    {
        $this->dateDemarrage = $dateDemarrage;

        return $this;
    }

    public function getNotifierAvant(): ?int
    {
        return $this->notifierAvant;
    }

    public function setNotifierAvant(int $notifierAvant): self
    {
        $this->notifierAvant = $notifierAvant;

        return $this;
    }

    public function getNombreDeRepetitions(): ?int
    {
        return $this->nombreDeRepetitions;
    }

    public function setNombreDeRepetitions(int $nombreDeRepetitions): self
    {
        $this->nombreDeRepetitions = $nombreDeRepetitions;

        return $this;
    }

    public function getIntervalleEnMinutes(): ?int
    {
        return $this->intervalleEnMinutes;
    }

    public function setIntervalleEnMinutes(?int $intervalleEnMinutes): self
    {
        $this->intervalleEnMinutes = $intervalleEnMinutes;

        return $this;
    }
}
