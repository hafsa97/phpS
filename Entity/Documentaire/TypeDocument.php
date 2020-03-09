<?php

namespace App\Entity\Documentaire;

use Doctrine\ORM\Mapping as ORM;
use App\Utils\Traits\Describable;


/**
 * @ORM\Entity(repositoryClass="App\Repository\Documentaire\TypeDocumentRepository")
 */
class TypeDocument
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

    public function __toString()
    {
        return $this->nom;
    }
}
