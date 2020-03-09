<?php

namespace App\Entity\Planification;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class PlanificationParMois extends Planification
{
    /**
     * @ORM\Column(type="json", length=255)
     */
    private $mois;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $typePlanParMois;

    /**
     * @ORM\Column(type="json", length=255, nullable=true)
     */
    private $joursDuMois;

    /**
     * @ORM\Column(type="json", length=255, nullable=true)
     */
    private $joursDeLaSemaine;

    /**
     * @ORM\Column(type="json", length=255, nullable=true)
     */
    private $numeroDeLaSemaine;

    public function getMois()
    {
        return $this->mois;
    }

    public function setMois($mois): void
    {
        $this->mois = $mois;
    }

    public function getJoursDuMois()
    {
        return $this->joursDuMois;
    }

    public function setJoursDuMois($joursDuMois): void
    {
        $this->joursDuMois = $joursDuMois;
    }

    public function getJoursDeLaSemaine()
    {
        return $this->joursDeLaSemaine;
    }

    public function setJoursDeLaSemaine($joursDeLaSemaine): void
    {
        $this->joursDeLaSemaine = $joursDeLaSemaine;
    }

    public function getNumeroDeLaSemaine()
    {
        return $this->numeroDeLaSemaine;
    }

    public function setNumeroDeLaSemaine($numeroDeLaSemaine): void
    {
        $this->numeroDeLaSemaine = $numeroDeLaSemaine;
    }


    public function getTypePlanParMois()
    {
        return $this->typePlanParMois;
    }

    public function setTypePlanParMois($typePlanParMois): void
    {
        $this->typePlanParMois = $typePlanParMois;
    }
}
