<?php

namespace App\Entity;

use App\Entity\Documentaire\Document;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaillasseRepository")
 */
class Paillasse
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
     * @ORM\OneToMany(targetEntity="App\Entity\Analyse", mappedBy="paillasse")
     */
    private $analyses;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Secteur", inversedBy="paillasses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $secteur;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $codeCourt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="paillasses")
     */
    private $utilisateurs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Documentaire\Document", mappedBy="Paillasses")
     */
    private $documents;

    public function __construct()
    {
        $this->analyses = new ArrayCollection();
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
     * @return Collection|Analyse[]
     */
    public function getAnalyses(): Collection
    {
        return $this->analyses;
    }

    public function addAnalysis(Analyse $analysis): self
    {
        if (!$this->analyses->contains($analysis)) {
            $this->analyses[] = $analysis;
            $analysis->setPaillasse($this);
        }

        return $this;
    }

    public function removeAnalysis(Analyse $analysis): self
    {
        if ($this->analyses->contains($analysis)) {
            $this->analyses->removeElement($analysis);
            // set the owning side to null (unless already changed)
            if ($analysis->getPaillasse() === $this) {
                $analysis->setPaillasse(null);
            }
        }

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
            $utilisateur->addPaillass($this);
        }

        return $this;
    }

    public function removeUtilisateur(User $utilisateur): self
    {
        if ($this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->removeElement($utilisateur);
            $utilisateur->removePaillass($this);
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
            $document->addPaillass($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->contains($document)) {
            $this->documents->removeElement($document);
            $document->removePaillass($this);
        }

        return $this;
    }
}
