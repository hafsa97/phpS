<?php

namespace App\Entity;

use App\Entity\Documentaire\Document;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PieceJointeRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class PieceJointe
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Veuillez fournir un titre.")
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $chemin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateAjout;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Materiel", inversedBy="piecesJointes")
     */
    private $materiel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TacheMaintenance", inversedBy="piecesJointes")
     */
    private $tacheMaintenance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Documentaire\Document", inversedBy="piecesJointes")
     */
    private $document;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getChemin(): ?string
    {
        return $this->chemin;
    }

    public function setChemin(string $chemin): self
    {
        $this->chemin = $chemin;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDateAjout(): ?DateTimeInterface
    {
        return $this->dateAjout;
    }

    public function setDateAjout(DateTimeInterface $dateAjout): self
    {
        $this->dateAjout = $dateAjout;

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
     * @ORM\PrePersist
     */
    public function onPrePersist(): void
    {
        $this->dateAjout = new DateTime();
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
}
