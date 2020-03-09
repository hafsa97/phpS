<?php

namespace App\Entity\Personnel;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Personnel\FrequenceEvaluationRepository")
 */
class FrequenceEvaluation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $frequence;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFrequence(): ?int
    {
        return $this->frequence;
    }

    public function setFrequence(int $frequence): self
    {
        $this->frequence = $frequence;

        return $this;
    }
}
