<?php

namespace App\Entity\Documentaire;

use App\Entity\User;
use App\Utils\Traits\Timestampable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Documentaire\NotificationDocumentRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class NotificationDocument
{

    use Timestampable;

    public static $tacheRedaction = "Tâche de rédaction";
    public static $tacheVerifcation = "Tâche de vérification";
    public static $TacheVerificationRefus = "Tâche de vérification refus";
    public static $tacheApprobation = "Tâche d'approbation";
    public static $TacheApprobationRefus = "Tâche d'approbation refus" ;
    public static $tacheDiffusion = "Tâche de diffusion";
    public static $tacheArchivage = "Tâche d'archivage";
    public static $sollicitationRedaction = "Sollicitation de rédaction";
    public static $sollicitationModification = "Sollicitation de modification";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
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
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateLecture;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Documentaire\Document")
     * @ORM\JoinColumn(nullable=true)
     */
    private $document;

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
        $this->date = $dateLecture;

        return $this;
    }

    public function getDocument(): ?Document
    {
        return $this->document;
    }

    public function setDocument(?Document $document): self
    {
        $this->document = $document;

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
