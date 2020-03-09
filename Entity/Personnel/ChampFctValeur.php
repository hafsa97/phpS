<?php

namespace App\Entity\Personnel;

use App\Entity\Personnel\Fonction;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Personnel\ChampFctValeurRepository")
 */
class ChampFctValeur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnel\ChampsParametrable", inversedBy="champ_fct_valeur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $champsParametrable;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnel\Fonction", inversedBy="champFctValeurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fonction;

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
        return $this->champsParametrable;
    }

    public function setChampsParametrable(?ChampsParametrable $champsParametrable): self
    {
        $this->champsParametrable = $champsParametrable;

        return $this;
    }

    public function getFonction(): ?Fonction
    {
        return $this->fonction;
    }

    public function setFonction(?Fonction $fonction): self
    {
        $this->fonction = $fonction;

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
