<?php

namespace App\Entity\Documentaire;

use App\Entity\Laboratoire;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Documentaire\CodageDocumentRepository")
 */
class CodageDocument
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
    private $formatCode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $formatVersion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $incrementVersion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombreDigitCompteur;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Laboratoire", inversedBy="codageDocument", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $laboratoire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormatCode(): ?string
    {
        return $this->formatCode;
    }

    public function setFormatCode(string $formatCode): self
    {
        $this->formatCode = $formatCode;

        return $this;
    }

    public function getFormatVersion(): ?string
    {
        return $this->formatVersion;
    }

    public function setFormatVersion(string $formatVersion): self
    {
        $this->formatVersion = $formatVersion;

        return $this;
    }

    public function getIncrementVersion(): ?string
    {
        return $this->incrementVersion;
    }

    public function setIncrementVersion(string $incrementVersion): self
    {
        $this->incrementVersion = $incrementVersion;

        return $this;
    }

    public function getNombreDigitCompteur(): ?string
    {
        return $this->nombreDigitCompteur;
    }

    public function setNombreDigitCompteur(string $nombreDigitCompteur): self
    {
        $this->nombreDigitCompteur = $nombreDigitCompteur;

        return $this;
    }

    public function getLaboratoire(): ?Laboratoire
    {
        return $this->laboratoire;
    }

    public function setLaboratoire(Laboratoire $laboratoire): self
    {
        $this->laboratoire = $laboratoire;

        return $this;
    }

    public function __toString()
    {
        return $this->formatCode;
    }
}
