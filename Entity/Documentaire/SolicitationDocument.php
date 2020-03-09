<?php

namespace App\Entity\Documentaire;

use App\Entity\Materiel;
use App\Entity\TacheMaintenance;
use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Documentaire\SolicitationDocumentRepository")
 */
class SolicitationDocument
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titre;

    /**
     * @ORM\Column(type="text",  nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Materiel")
     * @ORM\JoinColumn(nullable=true)
     */
    private $materiel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TacheMaintenance")
     * @ORM\JoinColumn(nullable=true)
     */
    private $tacheMaintenance;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ajoutePar;

    /**
     * @ORM\Column(type="date")
     */
    private $dateAjout;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Documentaire\SolicitationStatut", mappedBy="solicitation", cascade={"persist", "remove"})
     */
    private $solicitationStatut;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Documentaire\TacheDemandeRedaction", mappedBy="solicitation", cascade={"persist", "remove"})
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getAjoutePar(): ?User
    {
        return $this->ajoutePar;
    }

    public function setAjoutePar(?User $ajoutePar): self
    {
        $this->ajoutePar = $ajoutePar;

        return $this;
    }

    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->dateAjout;
    }

    public function setDateAjout(\DateTimeInterface $dateAjout): self
    {
        $this->dateAjout = $dateAjout;

        return $this;
    }

    public function getSolicitationStatut(): ?SolicitationStatut
    {
        return $this->solicitationStatut;
    }

    public function setSolicitationStatut(SolicitationStatut $solicitationStatut): self
    {
        $this->solicitationStatut = $solicitationStatut;

        // set the owning side of the relation if necessary
        if ($this !== $solicitationStatut->getSolicitation()) {
            $solicitationStatut->setSolicitation($this);
        }

        return $this;
    }

    public function getDocument(): ?TacheDemandeRedaction
    {
        return $this->document;
    }

    public function setDocument(?TacheDemandeRedaction $document): self
    {
        $this->document = $document;

        // set (or unset) the owning side of the relation if necessary
        $newSolicitation = $document === null ? null : $this;
        if ($newSolicitation !== $document->getSolicitation()) {
            $document->setSolicitation($newSolicitation);
        }

        return $this;
    }
}
