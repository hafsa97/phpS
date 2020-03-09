<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="app_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Materiel", mappedBy="utilisateursHabilitesUtilisation")
     */
    private $materielsHabilites;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Materiel", mappedBy="utilisateursAjoutMaintenances")
     */
    private $materielsAjoutMaintenances;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Materiel", mappedBy="utilisateursMaj", fetch="EAGER")
     */
    private $materielsMaj;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Materiel", mappedBy="utilisateursRealisationMaintenances")
     */
    private $materielsRealisationMaintenances;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RealisationTacheMaintenance", mappedBy="realisateur")
     */
    private $realisationTacheMaintenances;

    /**
     * @ORM\Column(type="string", length=50,nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=50,nullable=true)
     */
    private $prenom;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Secteur", inversedBy="utilisateurs")
     */
    private $secteurs;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Paillasse", inversedBy="utilisateurs")
     */
    private $paillasses;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Laboratoire", inversedBy="users")
     * @ORM\JoinColumn(nullable=true)
     */
    private $laboratoire;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function __construct()
    {
        parent::__construct();
        $this->materielsHabilites = new ArrayCollection();
        $this->materielsAjoutMaintenances = new ArrayCollection();
        $this->materielsMaj = new ArrayCollection();
        $this->materielsRealisationMaintenances = new ArrayCollection();
        $this->realisationTacheMaintenances = new ArrayCollection();
        $this->secteurs = new ArrayCollection();
        $this->paillasses = new ArrayCollection();
    }

    /**
     * @return Collection|Materiel[]
     */
    public function getMaterielsHabilites(): Collection
    {
        return $this->materielsHabilites;
    }

    public function addMaterielsHabilite(Materiel $materielsHabilite): self
    {
        if (!$this->materielsHabilites->contains($materielsHabilite)) {
            $this->materielsHabilites[] = $materielsHabilite;
            $materielsHabilite->addUtilisateursHabilitesUtilisation($this);
        }

        return $this;
    }

    public function removeMaterielsHabilite(Materiel $materielsHabilite): self
    {
        if ($this->materielsHabilites->contains($materielsHabilite)) {
            $this->materielsHabilites->removeElement($materielsHabilite);
            $materielsHabilite->removeUtilisateursHabilitesUtilisation($this);
        }

        return $this;
    }

    /**
     * @return Collection|Materiel[]
     */
    public function getMaterielsAjoutMaintenances(): Collection
    {
        return $this->materielsAjoutMaintenances;
    }

    public function addMaterielsAjoutMaintenance(Materiel $materielsAjoutMaintenance): self
    {
        if (!$this->materielsAjoutMaintenances->contains($materielsAjoutMaintenance)) {
            $this->materielsAjoutMaintenances[] = $materielsAjoutMaintenance;
            $materielsAjoutMaintenance->addUtilisateursAjoutMaintenance($this);
        }

        return $this;
    }

    public function removeMaterielsAjoutMaintenance(Materiel $materielsAjoutMaintenance): self
    {
        if ($this->materielsAjoutMaintenances->contains($materielsAjoutMaintenance)) {
            $this->materielsAjoutMaintenances->removeElement($materielsAjoutMaintenance);
            $materielsAjoutMaintenance->removeUtilisateursAjoutMaintenance($this);
        }

        return $this;
    }

    /**
     * @return Collection|Materiel[]
     */
    public function getMaterielsMaj(): Collection
    {
        return $this->materielsMaj;
    }

    public function addMaterielsMaj(Materiel $materielsMaj): self
    {
        if (!$this->materielsMaj->contains($materielsMaj)) {
            $this->materielsMaj[] = $materielsMaj;
            $materielsMaj->addUtilisateursMaj($this);
        }

        return $this;
    }

    public function removeMaterielsMaj(Materiel $materielsMaj): self
    {
        if ($this->materielsMaj->contains($materielsMaj)) {
            $this->materielsMaj->removeElement($materielsMaj);
            $materielsMaj->removeUtilisateursMaj($this);
        }

        return $this;
    }

    /**
     * @return Collection|Materiel[]
     */
    public function getMaterielsRealisationMaintenances(): Collection
    {
        return $this->materielsRealisationMaintenances;
    }

    public function addMaterielsRealisationMaintenance(Materiel $materielsRealisationMaintenance): self
    {
        if (!$this->materielsRealisationMaintenances->contains($materielsRealisationMaintenance)) {
            $this->materielsRealisationMaintenances[] = $materielsRealisationMaintenance;
            $materielsRealisationMaintenance->addUtilisateursRealisationMaintenance($this);
        }

        return $this;
    }

    public function removeMaterielsRealisationMaintenance(Materiel $materielsRealisationMaintenance): self
    {
        if ($this->materielsRealisationMaintenances->contains($materielsRealisationMaintenance)) {
            $this->materielsRealisationMaintenances->removeElement($materielsRealisationMaintenance);
            $materielsRealisationMaintenance->removeUtilisateursRealisationMaintenance($this);
        }

        return $this;
    }

    /**
     * @return Collection|RealisationTacheMaintenance[]
     */
    public function getRealisationTacheMaintenances(): Collection
    {
        return $this->realisationTacheMaintenances;
    }

    public function addRealisationTacheMaintenance(RealisationTacheMaintenance $realisationTacheMaintenance): self
    {
        if (!$this->realisationTacheMaintenances->contains($realisationTacheMaintenance)) {
            $this->realisationTacheMaintenances[] = $realisationTacheMaintenance;
            $realisationTacheMaintenance->setRealisateur($this);
        }

        return $this;
    }

    public function removeRealisationTacheMaintenance(RealisationTacheMaintenance $realisationTacheMaintenance): self
    {
        if ($this->realisationTacheMaintenances->contains($realisationTacheMaintenance)) {
            $this->realisationTacheMaintenances->removeElement($realisationTacheMaintenance);
            // set the owning side to null (unless already changed)
            if ($realisationTacheMaintenance->getRealisateur() === $this) {
                $realisationTacheMaintenance->setRealisateur(null);
            }
        }

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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
        return $this->paillasses;
    }

    public function addPaillass(Paillasse $paillass): self
    {
        if (!$this->paillasses->contains($paillass)) {
            $this->paillasses[] = $paillass;
        }

        return $this;
    }

    public function removePaillass(Paillasse $paillass): self
    {
        if ($this->paillasses->contains($paillass)) {
            $this->paillasses->removeElement($paillass);
        }

        return $this;
    }

    public function setUsername($username)
    {
        $this->setEmail($username);
        return parent::setUsername($username);
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
    public function __toString()
    {
        return parent::__toString(); // TODO: Change the autogenerated stub
    }


}