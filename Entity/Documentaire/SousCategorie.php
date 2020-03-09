<?php

namespace App\Entity\Documentaire;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Documentaire\SousCategorieRepository")
 */
class SousCategorie
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Documentaire\Categorie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Documentaire\SousCategorie")
     */
    private $SousCategorieParent;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $level;

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

    public function getCategorie(): ?categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getSousCategorieParent(): ?self
    {
        return $this->SousCategorieParent;
    }

    public function setSousCategorieParent(?self $SousCategorieParent): self
    {
        $this->SousCategorieParent = $SousCategorieParent;

        return $this;
    }
    public function __toString()
    {
        return $this->getNom();
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(?int $level): self
    {
        $this->level = $level;

        return $this;
    }
}
