<?php

namespace App\Entity;

use App\Utils\Traits\Timestampable;
use Doctrine\ORM\Mapping as ORM;
use App\Utils\Traits\Describable;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarteCodageRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class CarteCodage
{
    use Timestampable, Describable;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, unique=true)
     */
    private $label;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $valeur;

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getValeur(): ?string
    {
        return $this->valeur;
    }

    public function setValeur(string $valeur): self
    {
        $this->valeur = $valeur;

        return $this;
    }

    public static function getUniqueAttributes() {
        return ["label"];
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
