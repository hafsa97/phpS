<?php

namespace App\Entity\Documentaire;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Documentaire\ParametrageDiffusionRepository")
 */
class ParametrageDiffusion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estAutomatique;

    /**
     * @ORM\Column(type="integer")
     */
    private $delaiAvantApplication;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstAutomatique(): ?bool
    {
        return $this->estAutomatique;
    }

    public function setEstAutomatique(bool $estAutomatique): self
    {
        $this->estAutomatique = $estAutomatique;

        return $this;
    }

    public function getDelaiAvantApplication(): ?int
    {
        return $this->delaiAvantApplication;
    }

    public function setDelaiAvantApplication(int $delaiAvantApplication): self
    {
        $this->delaiAvantApplication = $delaiAvantApplication;

        return $this;
    }
}
