<?php

namespace App\Entity;

use App\Utils\Traits\Describable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SelRepository")
 */
class Sel
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
     * @ORM\OneToMany(targetEntity="App\Entity\Laboratoire", mappedBy="sel")
     * @ORM\OrderBy({"id" = "ASC"})
     */
    private $laboratoires;

    /**
     * @ORM\Column(type="string", length=10, unique=true)
     */
    private $prefix;

    public function __construct()
    {
        $this->laboratoires = new ArrayCollection();
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
            $laboratoire->setSel($this);
        }

        return $this;
    }

    public function removeLaboratoire(Laboratoire $laboratoire): self
    {
        if ($this->laboratoires->contains($laboratoire)) {
            $this->laboratoires->removeElement($laboratoire);
            // set the owning side to null (unless already changed)
            if ($laboratoire->getSel() === $this) {
                $laboratoire->setSel(null);
            }
        }

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

    public static function getColumns() {
        return ["nom", "prefix"];
    }

    public static function getUniqueAttributes() {
        return ["nom", "prefix"];
    }
}
