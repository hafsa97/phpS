<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * @ORM\Entity(repositoryClass="App\Repository\AnalyseRepository")
 * @ORM\Table(name="dictionaire_analyse")
 * @UniqueEntity(fields={"code" , "laboratoire"}, message="Ce code est déjà utilisé dans ce laboratoire.")
 */
class Analyse
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Laboratoire")
     * @ORM\JoinColumn(nullable=false)
     */
    private $laboratoire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Secteur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $secteur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Paillasse", inversedBy="analyses")
     * @ORM\JoinColumn(nullable=true)
     */
    private $paillasse;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $code;

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

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLaboratoire(): ?Laboratoire
    {
        return $this->laboratoire;
    }

    public function setLaboratoire(?Laboratoire $laboratoire): self
    {
        $this->laboratoire = $laboratoire;

        return $this;
    }

    public function getSecteur(): ?Secteur
    {
        return $this->secteur;
    }

    public function setSecteur(?Secteur $secteur): self
    {
        $this->secteur = $secteur;

        return $this;
    }

    public function getPaillasse(): ?Paillasse
    {
        return $this->paillasse;
    }

    public function setPaillasse(?Paillasse $paillasse): self
    {
        $this->paillasse = $paillasse;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(?string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }
}
