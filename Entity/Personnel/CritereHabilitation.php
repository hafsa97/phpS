<?php

namespace App\Entity\Personnel;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Personnel\CritereHabilitationRepository")
 */
class CritereHabilitation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnel\Habilitation", inversedBy="critereHabilitations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $habilitation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $noteSur;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $optionnel;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNoteSur(): ?int
    {
        return $this->noteSur;
    }

    public function setNoteSur(int $noteSur): self
    {
        $this->noteSur = $noteSur;

        return $this;
    }

    public function getOptionnel(): ?bool
    {
        return $this->optionnel;
    }

    public function setOptionnel(?bool $optionnel): self
    {
        $this->optionnel = $optionnel;

        return $this;
    }
}
