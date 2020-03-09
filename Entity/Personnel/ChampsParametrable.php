<?php

namespace App\Entity\Personnel;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Personnel\ChampsParametrableRepository")
 */
class ChampsParametrable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personnel\ChampFctValeur", mappedBy="champsParametrable")
     */
    private $champ_fct_valeur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personnel\ChampHblValeur", mappedBy="champs_parametrable")
     */
    private $champHblValeurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personnel\ChampFrmtValeur", mappedBy="champs_parametrable")
     */
    private $champFrmtValeurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personnel\ChampClbValeur", mappedBy="champs_parametrable")
     */
    private $champClbValeurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personnel\ChampEntrValeur", mappedBy="champs_parametrable")
     */
    private $champEntrValeurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personnel\ChampUserValeur", mappedBy="champs_parametrable")
     */
    private $champUserValeurs;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ctrlChamp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tableP;

    public function __construct()
    {
        $this->champ_fct_valeur = new ArrayCollection();
        $this->champHblValeurs = new ArrayCollection();
        $this->champFrmtValeurs = new ArrayCollection();
        $this->champClbValeurs = new ArrayCollection();
        $this->champEntrValeurs = new ArrayCollection();
        $this->champUserValeurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|ChampFctValeur[]
     */
    public function getChampFctValeur(): Collection
    {
        return $this->champ_fct_valeur;
    }

    public function addChampFctValeur(ChampFctValeur $champFctValeur): self
    {
        if (!$this->champ_fct_valeur->contains($champFctValeur)) {
            $this->champ_fct_valeur[] = $champFctValeur;
            $champFctValeur->setChampsParametrable($this);
        }

        return $this;
    }

    public function removeChampFctValeur(ChampFctValeur $champFctValeur): self
    {
        if ($this->champ_fct_valeur->contains($champFctValeur)) {
            $this->champ_fct_valeur->removeElement($champFctValeur);
            // set the owning side to null (unless already changed)
            if ($champFctValeur->getChampsParametrable() === $this) {
                $champFctValeur->setChampsParametrable(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ChampHblValeur[]
     */
    public function getChampHblValeurs(): Collection
    {
        return $this->champHblValeurs;
    }

    public function addChampHblValeur(ChampHblValeur $champHblValeur): self
    {
        if (!$this->champHblValeurs->contains($champHblValeur)) {
            $this->champHblValeurs[] = $champHblValeur;
            $champHblValeur->setChampsParametrable($this);
        }

        return $this;
    }

    public function removeChampHblValeur(ChampHblValeur $champHblValeur): self
    {
        if ($this->champHblValeurs->contains($champHblValeur)) {
            $this->champHblValeurs->removeElement($champHblValeur);
            // set the owning side to null (unless already changed)
            if ($champHblValeur->getChampsParametrable() === $this) {
                $champHblValeur->setChampsParametrable(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ChampFrmtValeur[]
     */
    public function getChampFrmtValeurs(): Collection
    {
        return $this->champFrmtValeurs;
    }

    public function addChampFrmtValeur(ChampFrmtValeur $champFrmtValeur): self
    {
        if (!$this->champFrmtValeurs->contains($champFrmtValeur)) {
            $this->champFrmtValeurs[] = $champFrmtValeur;
            $champFrmtValeur->setChampsParametrable($this);
        }

        return $this;
    }

    public function removeChampFrmtValeur(ChampFrmtValeur $champFrmtValeur): self
    {
        if ($this->champFrmtValeurs->contains($champFrmtValeur)) {
            $this->champFrmtValeurs->removeElement($champFrmtValeur);
            // set the owning side to null (unless already changed)
            if ($champFrmtValeur->getChampsParametrable() === $this) {
                $champFrmtValeur->setChampsParametrable(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ChampClbValeur[]
     */
    public function getChampClbValeurs(): Collection
    {
        return $this->champClbValeurs;
    }

    public function addChampClbValeur(ChampClbValeur $champClbValeur): self
    {
        if (!$this->champClbValeurs->contains($champClbValeur)) {
            $this->champClbValeurs[] = $champClbValeur;
            $champClbValeur->setChampsParametrable($this);
        }

        return $this;
    }

    public function removeChampClbValeur(ChampClbValeur $champClbValeur): self
    {
        if ($this->champClbValeurs->contains($champClbValeur)) {
            $this->champClbValeurs->removeElement($champClbValeur);
            // set the owning side to null (unless already changed)
            if ($champClbValeur->getChampsParametrable() === $this) {
                $champClbValeur->setChampsParametrable(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ChampEntrValeur[]
     */
    public function getChampEntrValeurs(): Collection
    {
        return $this->champEntrValeurs;
    }

    public function addChampEntrValeur(ChampEntrValeur $champEntrValeur): self
    {
        if (!$this->champEntrValeurs->contains($champEntrValeur)) {
            $this->champEntrValeurs[] = $champEntrValeur;
            $champEntrValeur->setChampsParametrable($this);
        }

        return $this;
    }

    public function removeChampEntrValeur(ChampEntrValeur $champEntrValeur): self
    {
        if ($this->champEntrValeurs->contains($champEntrValeur)) {
            $this->champEntrValeurs->removeElement($champEntrValeur);
            // set the owning side to null (unless already changed)
            if ($champEntrValeur->getChampsParametrable() === $this) {
                $champEntrValeur->setChampsParametrable(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ChampUserValeur[]
     */
    public function getChampUserValeurs(): Collection
    {
        return $this->champUserValeurs;
    }

    public function addChampUserValeur(ChampUserValeur $champUserValeur): self
    {
        if (!$this->champUserValeurs->contains($champUserValeur)) {
            $this->champUserValeurs[] = $champUserValeur;
            $champUserValeur->setChampsParametrable($this);
        }

        return $this;
    }

    public function removeChampUserValeur(ChampUserValeur $champUserValeur): self
    {
        if ($this->champUserValeurs->contains($champUserValeur)) {
            $this->champUserValeurs->removeElement($champUserValeur);
            // set the owning side to null (unless already changed)
            if ($champUserValeur->getChampsParametrable() === $this) {
                $champUserValeur->setChampsParametrable(null);
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getCtrlChamp(): ?string
    {
        return $this->ctrlChamp;
    }

    public function setCtrlChamp(string $ctrlChamp): self
    {
        $this->ctrlChamp = $ctrlChamp;

        return $this;
    }

    public function getTableP(): ?string
    {
        return $this->tableP;
    }

    public function setTableP(?string $tableP): self
    {
        $this->tableP = $tableP;

        return $this;
    }
}
