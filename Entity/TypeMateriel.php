<?php

namespace App\Entity;

use App\Utils\Traits\Activable;
use App\Utils\Traits\Describable;
use App\Utils\Traits\Timestampable;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeMaterielRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class TypeMateriel
{
    use Timestampable, Describable, Activable;
    
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=10, unique=true)
     */
    private $codeCourt;

    public function setId($id): void
    {
        $this->id = $id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

    public static function getUniqueAttributes() {
        return ["nom", "code_court"];
    }

    public function getCodeCourt():  ?string
    {
        return $this->codeCourt;
    }

    public function setCodeCourt(string $codeCourt): self
    {
        $this->codeCourt = $codeCourt;

        return $this;
    }
}
