<?php

namespace App\Entity\Documentaire;

use Doctrine\ORM\Mapping as ORM;
use App\Utils\Traits\Describable;


/**
 * @ORM\Entity(repositoryClass="App\Repository\Documentaire\SousTypeDocumentRepository")
 */
class SousTypeDocument
{
    use  Describable;
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codeCourt;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Documentaire\RevisionDocumentaire", mappedBy="sousType", cascade={"persist", "remove"})
     */
    private $frequenceRevision;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCodeCourt(): ?string
    {
        return $this->codeCourt;
    }

    public function setCodeCourt(string $codeCourt): self
    {
        $this->codeCourt = $codeCourt;

        return $this;
    }

    public function getFrequenceRevision(): ?RevisionDocumentaire
    {
        return $this->frequenceRevision;
    }

    public function setFrequenceRevision(RevisionDocumentaire $frequenceRevision): self
    {
        $this->frequenceRevision = $frequenceRevision;

        // set the owning side of the relation if necessary
        if ($this !== $frequenceRevision->getSousType()) {
            $frequenceRevision->setSousType($this);
        }

        return $this;
    }
    public function __toString()
    {
        return $this->nom;
    }
}
