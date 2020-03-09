<?php

namespace App\Entity\Documentaire;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Documentaire\RevisionDocumentaireRepository")
 */
class RevisionDocumentaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $frequence;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Documentaire\SousTypeDocument", inversedBy="frequenceRevision", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $sousType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFrequence(): ?int
    {
        return $this->frequence;
    }

    public function setFrequence(int $frequence): self
    {
        $this->frequence = $frequence;

        return $this;
    }

    public function getSousType(): ?SousTypeDocument
    {
        return $this->sousType;
    }

    public function setSousType(SousTypeDocument $sousType): self
    {
        $this->sousType = $sousType;

        return $this;
    }
}
