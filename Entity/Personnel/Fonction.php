<?php

namespace App\Entity\Personnel;

use App\Entity\Personnel\Habilitation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Personnel\FonctionRepository")
 */
class Fonction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FicheFonction;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etat;

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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

    public function getFicheFonction(): ?string
    {
        return $this->FicheFonction;
    }

    public function setFicheFonction(string $FicheFonction): self
    {
        $this->FicheFonction = $FicheFonction;

        return $this;
    }

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Personnel\Habilitation", inversedBy="fonctions")
     */
    private $habilitation;

    public function __construct()
    {
        $this->habilitation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Habilitation[]
     */
    public function getHabilitation(): Collection
    {
        return $this->habilitation;
    }

    public function addHabilitation(Habilitation $habilitation): self
    {
        if (!$this->habilitation->contains($habilitation)) {
            $this->habilitation[] = $habilitation;
        }

        return $this;
    }

    public function removeHabilitation(Habilitation $habilitation): self
    {
        if ($this->habilitation->contains($habilitation)) {
            $this->habilitation->removeElement($habilitation);
        }

        return $this;
    }
}
