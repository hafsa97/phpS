<?php


namespace App\Entity\Documentaire;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class TacheDemandeModification extends TacheDocument
{

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $motifModification;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Documentaire\SolicitationDocument", inversedBy="document", cascade={"persist", "remove"})
     */
    private $solicitation;

    public function getSolicitation(): ?SolicitationDocument
    {
        return $this->solicitation;
    }

    public function setSolicitation(?SolicitationDocument $solicitation): self
    {
        $this->solicitation = $solicitation;

        return $this;
    }


    /**
     * @return mixed
     */
    public function getMotifModification()
    {
        return $this->motifModification;
    }

    /**
     * @param mixed $motifModification
     */
    public function setMotifModification($motifModification): void
    {
        $this->motifModification = $motifModification;
    }

    public function getTypeTache() {
        return parent::TacheDemandeModification;
    }
}