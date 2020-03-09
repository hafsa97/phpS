<?php


namespace App\Entity\Documentaire;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 */
class TacheDemandeRedaction extends TacheDocument
{
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
    public function getTypeTache() {
        return parent::TacheDemandeRedaction;
    }
}