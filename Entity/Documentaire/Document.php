<?php

namespace App\Entity\Documentaire;

use App\Entity\Laboratoire;
use App\Entity\Materiel;
use App\Entity\Paillasse;
use App\Entity\PieceJointe;
use App\Entity\Secteur;
use App\Entity\TacheMaintenance;
use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Documentaire\DocumentRepository")
 */
class Document
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $motsCles;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chemin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Documentaire\TypeDocument")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Documentaire\SousTypeDocument")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sousType;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Documentaire\CodageDocument")
     * @ORM\JoinColumn(nullable=false)
     */
    private $strategieCodage;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Documentaire\SousCategorie")
     */
    private $sousChapitre;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Documentaire\Categorie")
     */
    private $chapitre;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Documentaire\Classement")
     */
    private $classements;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Materiel")
     */
    private $materiel;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TacheMaintenance")
     */
    private $tacheMaintenance;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Documentaire\Document")
     */
    private $documentsLies;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Laboratoire", inversedBy="documents")
     */
    private $laboratoires;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Secteur", inversedBy="documents")
     */
    private $secteurs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Paillasse", inversedBy="documents")
     */
    private $Paillasses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Documentaire\TacheDocument", mappedBy="document")
     */
    private $tacheDocuments;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PieceJointe", mappedBy="document")
     */
    private $piecesJointes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User")
     */
    private $destinataires;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User")
     * @ORM\JoinTable(name="document_favoris_user")
     */
    private $favoris;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User")
     * @ORM\JoinTable(name="document_attestation_user")
     */
    private $attestationLecture;



    public function __construct()
    {
        $this->sousChapitre = new ArrayCollection();
        $this->chapitre = new ArrayCollection();
        $this->classements = new ArrayCollection();
        $this->documentsLies = new ArrayCollection();
        $this->laboratoires = new ArrayCollection();
        $this->secteurs = new ArrayCollection();
        $this->Paillasses = new ArrayCollection();
        $this->tacheDocuments = new ArrayCollection();
        $this->piecesJointes = new ArrayCollection();
        $this->destinataires = new ArrayCollection();
        $this->favoris = new ArrayCollection();
        $this->attestationLecture = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getMotsCles(): ?string
    {
        return $this->motsCles;
    }

    public function setMotsCles(?string $motsCles): self
    {
        $this->motsCles = $motsCles;

        return $this;
    }

    public function getChemin(): ?string
    {
        return $this->chemin;
    }

    public function setChemin(?string $chemin): self
    {
        $this->chemin = $chemin;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getType(): ?TypeDocument
    {
        return $this->type;
    }

    public function setType(?TypeDocument $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSousType(): ?SousTypeDocument
    {
        return $this->sousType;
    }

    public function setSousType(?SousTypeDocument $sousType): self
    {
        $this->sousType = $sousType;

        return $this;
    }

    public function getStrategieCodage(): ?CodageDocument
    {
        return $this->strategieCodage;
    }

    public function setStrategieCodage(?CodageDocument $strategieCodage): self
    {
        $this->strategieCodage = $strategieCodage;

        return $this;
    }

    /**
     * @return Collection|SousCategorie[]
     */
    public function getSousChapitre(): Collection
    {
        return $this->sousChapitre;
    }

    public function addSousChapitre(SousCategorie $sousChapitre): self
    {
        if (!$this->sousChapitre->contains($sousChapitre)) {
            $this->sousChapitre[] = $sousChapitre;
        }

        return $this;
    }

    public function removeSousChapitre(SousCategorie $sousChapitre): self
    {
        if ($this->sousChapitre->contains($sousChapitre)) {
            $this->sousChapitre->removeElement($sousChapitre);
        }

        return $this;
    }

    /**
     * @return Collection|Categorie[]
     */
    public function getChapitre(): Collection
    {
        return $this->chapitre;
    }

    public function addChapitre(Categorie $chapitre): self
    {
        if (!$this->chapitre->contains($chapitre)) {
            $this->chapitre[] = $chapitre;
        }

        return $this;
    }

    public function removeChapitre(Categorie $chapitre): self
    {
        if ($this->chapitre->contains($chapitre)) {
            $this->chapitre->removeElement($chapitre);
        }

        return $this;
    }

    /**
     * @return Collection|Classement[]
     */
    public function getClassements(): Collection
    {
        return $this->classements;
    }

    public function addClassement(Classement $classement): self
    {
        if (!$this->classements->contains($classement)) {
            $this->classements[] = $classement;
        }

        return $this;
    }

    public function removeClassement(Classement $classement): self
    {
        if ($this->classements->contains($classement)) {
            $this->classements->removeElement($classement);
        }

        return $this;
    }

    public function getMateriel(): ?Materiel
    {
        return $this->materiel;
    }

    public function setMateriel(?Materiel $materiel): self
    {
        $this->materiel = $materiel;

        return $this;
    }

    public function getTacheMaintenance(): ?TacheMaintenance
    {
        return $this->tacheMaintenance;
    }

    public function setTacheMaintenance(?TacheMaintenance $tacheMaintenance): self
    {
        $this->tacheMaintenance = $tacheMaintenance;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getDocumentsLies(): Collection
    {
        return $this->documentsLies;
    }

    public function addDocumentsLies(self $documentsLy): self
    {
        if (!$this->documentsLies->contains($documentsLy)) {
            $this->documentsLies[] = $documentsLy;
        }

        return $this;
    }

    public function removeDocumentsLy(self $documentsLy): self
    {
        if ($this->documentsLies->contains($documentsLy)) {
            $this->documentsLies->removeElement($documentsLy);
        }

        return $this;
    }

    /**
     * @return Collection|Laboratoire[]
     */
    public function getLaboratoires(): Collection
    {
        return $this->laboratoires;
    }

    public function addLaboratoire(Laboratoire $laboratoire): self
    {
        if (!$this->laboratoires->contains($laboratoire)) {
            $this->laboratoires[] = $laboratoire;
        }

        return $this;
    }

    public function removeLaboratoire(Laboratoire $laboratoire): self
    {
        if ($this->laboratoires->contains($laboratoire)) {
            $this->laboratoires->removeElement($laboratoire);
        }

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
        }

        return $this;
    }

    public function removeSecteur(Secteur $secteur): self
    {
        if ($this->secteurs->contains($secteur)) {
            $this->secteurs->removeElement($secteur);
        }

        return $this;
    }

    /**
     * @return Collection|Paillasse[]
     */
    public function getPaillasses(): Collection
    {
        return $this->Paillasses;
    }

    public function addPaillass(Paillasse $paillass): self
    {
        if (!$this->Paillasses->contains($paillass)) {
            $this->Paillasses[] = $paillass;
        }

        return $this;
    }

    public function removePaillass(Paillasse $paillass): self
    {
        if ($this->Paillasses->contains($paillass)) {
            $this->Paillasses->removeElement($paillass);
        }

        return $this;
    }

    /**
     * @return Collection|TacheDocument[]
     */
    public function getTacheDocuments(): Collection
    {
        return $this->tacheDocuments;
    }

    public function addTacheDocument(TacheDocument $tacheDocument): self
    {
        if (!$this->tacheDocuments->contains($tacheDocument)) {
            $this->tacheDocuments[] = $tacheDocument;
            $tacheDocument->setDocument($this);
        }

        return $this;
    }

    public function removeTacheDocument(TacheDocument $tacheDocument): self
    {
        if ($this->tacheDocuments->contains($tacheDocument)) {
            $this->tacheDocuments->removeElement($tacheDocument);
            // set the owning side to null (unless already changed)
            if ($tacheDocument->getDocument() === $this) {
                $tacheDocument->setDocument(null);
            }
        }

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * @return Collection|PieceJointe[]
     */
    public function getPiecesJointes(): Collection
    {
        return $this->piecesJointes;
    }

    public function addPiecesJointe(PieceJointe $piecesJointe): self
    {
        if (!$this->piecesJointes->contains($piecesJointe)) {
            $this->piecesJointes[] = $piecesJointe;
            $piecesJointe->setDocument($this);
        }

        return $this;
    }

    public function removePiecesJointe(PieceJointe $piecesJointe): self
    {
        if ($this->piecesJointes->contains($piecesJointe)) {
            $this->piecesJointes->removeElement($piecesJointe);
            // set the owning side to null (unless already changed)
            if ($piecesJointe->getDocument() === $this) {
                $piecesJointe->setDocument(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getDestinataires(): Collection
    {
        return $this->destinataires;
    }

    public function addDestinataire(User $destinataire): self
    {
        if (!$this->destinataires->contains($destinataire)) {
            $this->destinataires[] = $destinataire;
        }

        return $this;
    }

    public function removeDestinataire(User $destinataire): self
    {
        if ($this->destinataires->contains($destinataire)) {
            $this->destinataires->removeElement($destinataire);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getFavoris(): Collection
    {
        return $this->favoris;
    }

    public function addFavori(User $favori): self
    {
        if (!$this->favoris->contains($favori)) {
            $this->favoris[] = $favori;
        }

        return $this;
    }

    public function removeFavori(User $favori): self
    {
        if ($this->favoris->contains($favori)) {
            $this->favoris->removeElement($favori);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getAttestationLecture(): Collection
    {
        return $this->attestationLecture;
    }

    public function addAttestationLecture(User $attestationLecture): self
    {
        if (!$this->attestationLecture->contains($attestationLecture)) {
            $this->attestationLecture[] = $attestationLecture;
        }

        return $this;
    }

    public function removeAttestationLecture(User $attestationLecture): self
    {
        if ($this->attestationLecture->contains($attestationLecture)) {
            $this->attestationLecture->removeElement($attestationLecture);
        }

        return $this;
    }


}
