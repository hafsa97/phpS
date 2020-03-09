<?php

namespace App\Entity\Personnel;

use App\Entity\Personnel\Habilitation;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Personnel\ChampHblValeurRepository")
 */
class ChampHblValeur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnel\ChampsParametrable", inversedBy="champHblValeurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $champs_parametrable;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnel\Habilitation", inversedBy="champHblValeurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $habilitation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $valeur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChampsParametrable(): ?ChampsParametrable
    {
        return $this->champs_parametrable;
    }

    public function setChampsParametrable(?ChampsParametrable $champs_parametrable): self
    {
        $this->champs_parametrable = $champs_parametrable;

        return $this;
    }

    public function getHabilitation(): ?Habilitation
    {
        return $this->habilitation;
    }

    public function setHabilitation(?Habilitation $habilitation): self
    {
        $this->habilitation = $habilitation;

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
}
