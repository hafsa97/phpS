<?php

namespace App\Entity\Planification;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class PlanificationParJours extends Planification
{
    /**
     * @ORM\Column(type="integer")
     */
    private $intervalJours;

    public function getIntervalJours(): ?int
    {
        return $this->intervalJours;
    }

    public function setIntervalJours(int $intervalJours): self
    {
        $this->intervalJours = $intervalJours;

        return $this;
    }
}
