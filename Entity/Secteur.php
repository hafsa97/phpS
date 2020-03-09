<?php

namespace App\Entity;

use App\Entity\Documentaire\Document;
use App\Utils\Traits\Describable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SecteurRepository")
 */
class Secteur
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
     * @ORM\OneToMany(targetEntity="App\Entity\Paillasse", mappedBy="secteur")
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $paillasses;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $codeCourt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Laboratoire", inversedBy="secteurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $laboratoire;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="secteurs")
     */
    private $utilisateurs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Documentaire\Document", mappedBy="secteurs")
     */
    private $documents;

    public function __construct()
    {
        $this->paillasses = new ArrayCollection();
        $this->utilisateurs = new ArrayCollection();
        $this->documents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
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

    /**
     * @return Collection|Paillasse[]
     */
    public function getPaillasses(): Collection
    {
        return $this->paillasses;
    }

    public function addPaillasse(Paillasse $paillasse): self
    {
        if (!$this->paillasses->contains($paillasse)) {
            $this->paillasses[] = $paillasse;
            $paillasse->setSecteur($this);
        }

        return $this;
    }

    public function removePaillasse(Paillasse $paillasse): self
    {
        if ($this->paillasses->contains($paillasse)) {
            $this->paillasses->removeElement($paillasse);
            // set the owning side to null (unless already changed)
            if ($paillasse->getSecteur() === $this) {
                $paillasse->setSecteur(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getCodeCourt():  ?string
    {
        return $this->codeCourt;
    }

    public function setCodeCourt(?string $codeCourt): self
    {
        $this->codeCourt = $codeCourt;

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

    public static function getColumns() {
        return ["nom", "description", "code_court"];
    }

    public static function getUniqueAttributes() {
        return ["nom", "code_court"];
    }

    /**
     * @return Collection|User[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(User $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->addSecteur($this);
        }

        return $this;
    }

    public function removeUtilisateur(User $utilisateur): self
    {
        if ($this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->removeElement($utilisateur);
            $utilisateur->removeSecteur($this);
        }

        return $this;
    }

    public function addPaillass(Paillasse $paillass): self
    {
        if (!$this->paillasses->contains($paillass)) {
            $this->paillasses[] = $paillass;
            $paillass->setSecteur($this);
        }

        return $this;
    }

    public function removePaillass(Paillasse $paillass): self
    {
        if ($this->paillasses->contains($paillass)) {
            $this->paillasses->removeElement($paillass);
            // set the owning side to null (unless already changed)
            if ($paillass->getSecteur() === $this) {
                $paillass->setSecteur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Document[]
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->documents->contains($document)) {
            $this->documents[] = $document;
            $document->addSecteur($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->contains($document)) {
            $this->documents->removeElement($document);
            $document->removeSecteur($this);
        }

        return $this;
    }
}
