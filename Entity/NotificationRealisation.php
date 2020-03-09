<?php

namespace App\Entity;

use App\Utils\Traits\Timestampable;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NotificationRealisationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class NotificationRealisation
{
    use Timestampable;

    public static $en_attente_affectation = "attente_affectation";
    public static $affectation = "affectation";
    public static $affectation_admin = "affectation_admin";
    public static $retard_affectation = "retard_affectation";
    public static $retard_realisation = "retard_realisation";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer", name="id_notification")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $typeNotification;

    /**
     * @ORM\Column(type="boolean")
     */
    private $statut;

    /**
     * @ORM\Column(type="boolean")
     */
    private $lu;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateLecture;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\RealisationTacheMaintenance", inversedBy="notifications")
     * @ORM\JoinColumn(nullable=false)
     */
    private $realisation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateurConcerne;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeNotification(): ?string
    {
        return $this->typeNotification;
    }

    public function setTypeNotification(string $typeNotification): self
    {
        $this->typeNotification = $typeNotification;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getLu(): ?bool
    {
        return $this->lu;
    }

    public function setLu(bool $lu): self
    {
        $this->lu = $lu;

        return $this;
    }

    public function getDateLecture(): ?\DateTimeInterface
    {
        return $this->dateLecture;
    }

    public function setDateLecture(?\DateTimeInterface $dateLecture): self
    {
        $this->dateLecture = $dateLecture;

        return $this;
    }

    public function getRealisation(): ?RealisationTacheMaintenance
    {
        return $this->realisation;
    }

    public function setRealisation(?RealisationTacheMaintenance $realisation): self
    {
        $this->realisation = $realisation;

        return $this;
    }

    public function getUtilisateurConcerne(): ?User
    {
        return $this->utilisateurConcerne;
    }

    public function setUtilisateurConcerne(?User $utilisateurConcerne): self
    {
        $this->utilisateurConcerne = $utilisateurConcerne;

        return $this;
    }
}
