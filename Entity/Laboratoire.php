<?php

namespace App\Entity;

use App\Entity\Documentaire\CodageDocument;
use App\Entity\Documentaire\Document;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LaboratoireRepository")
 */
class Laboratoire
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
    private $logo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sel", inversedBy="laboratoires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Secteur", mappedBy="laboratoire")
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $secteurs;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=10, unique=true)
     */
    private $prefix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="laboratoire")
     */
    private $users;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Documentaire\CodageDocument", mappedBy="laboratoire", cascade={"persist", "remove"})
     */
    private $codageDocument;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Documentaire\Document", mappedBy="laboratoires")
     */
    private $documents;

    public function __construct()
    {
        $this->secteurs = new ArrayCollection();
        $this->users = new ArrayCollection();
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

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getSel(): ?Sel
    {
        return $this->sel;
    }

    public function setSel(?Sel $sel): self
    {
        $this->sel = $sel;

        return $this;
    }

    /**
     * @return Collection|Secteur[]
     */
    public function getSecteurs(): Collection
    {
        return $this->secteurs;
    }

    public function addSecteur(Secteur $secteur): self
    {
        if (!$this->secteurs->contains($secteur)) {
            $this->secteurs[] = $secteur;
            $secteur->setLaboratoire($this);
        }

        return $this;
    }

    public function removeSecteur(Secteur $secteur): self
    {
        if ($this->secteurs->contains($secteur)) {
            $this->secteurs->removeElement($secteur);
            // set the owning side to null (unless already changed)
            if ($secteur->getLaboratoire() === $this) {
                $secteur->setLaboratoire(null);
            }
        }

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    public function setPrefix(string $prefix): self
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public static function getColumns() {
        return ["nom", "ville", "code_postal", "prefix", "adresse"];
    }

    public static function getUniqueAttributes() {
        return ["nom", "prefix"];
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setLaboratoire($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getLaboratoire() === $this) {
                $user->setLaboratoire(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getCodageDocument(): ?CodageDocument
    {
        return $this->codageDocument;
    }

    public function setCodageDocument(CodageDocument $codageDocument): self
    {
        $this->codageDocument = $codageDocument;

        // set the owning side of the relation if necessary
        if ($this !== $codageDocument->getLaboratoire()) {
            $codageDocument->setLaboratoire($this);
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
            $document->addLaboratoire($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->documents->contains($document)) {
            $this->documents->removeElement($document);
            $document->removeLaboratoire($this);
        }

        return $this;
    }
}
