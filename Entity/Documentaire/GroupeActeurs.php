<?php

namespace App\Entity\Documentaire;

use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Documentaire\GroupeActeursRepository")
 */
class GroupeActeurs
{
    public static $groupe_redacteurs = "groupe_redacteurs";
    public static $groupe_verificateurs = "groupe_verificateurs";
    public static $groupe_approbateurs = "groupe_approbateurs";
    public static $groupe_diffuseurs = "groupe_diffuseurs";
    public static $groupe_archiveurs = "groupe_archiveurs";


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", cascade={"remove"})
     */
    private $Acteur;

    public function __construct()
    {
        $this->Acteur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|User[]
     */
    public function getActeur(): Collection
    {
        return $this->Acteur;
    }

    public function addActeur(User $acteur): self
    {
        if (!$this->Acteur->contains($acteur)) {
            $this->Acteur[] = $acteur;
        }

        return $this;
    }

    public function removeActeur(User $acteur): self
    {
        if ($this->Acteur->contains($acteur)) {
            $this->Acteur->removeElement($acteur);
        }

        return $this;
    }
}
