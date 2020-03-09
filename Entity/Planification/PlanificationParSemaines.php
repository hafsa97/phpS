<?php

namespace App\Entity\Planification;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PlanificationParSemaines extends Planification
{
    /**
     * @ORM\Column(type="integer")
     */
    private $intervalSemaines;

    /**
     * @ORM\Column(type="json", length=255)
     */
    private $jours;

    public function getIntervalSemaines(): ?int
    {
        return $this->intervalSemaines;
    }

    public function setIntervalSemaines(int $intervalSemaines): self
    {
        $this->intervalSemaines = $intervalSemaines;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getJours()
    {
        return $this->jours;
    }

    /**
     * @param mixed $jours
     */
    public function setJours($jours): void
    {
        $this->jours = $jours;
    }



}
