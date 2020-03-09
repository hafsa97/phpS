<?php


namespace App\Entity\Documentaire;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class TacheApprobation extends TacheDocument
{

    /**
     * @ORM\Column(type="boolean")
     */
    private $estApprouve;

    /**
     * @ORM\Column(type="string")
     */
    private $motifRefus;

    /**
     * @return mixed
     */
    public function getEstApprouve()
    {
        return $this->estApprouve;
    }

    /**
     * @param mixed $estApprouve
     */
    public function setEstApprouve($estApprouve): void
    {
        $this->estApprouve = $estApprouve;
    }

    /**
     * @return mixed
     */
    public function getMotifRefus()
    {
        return $this->motifRefus;
    }

    /**
     * @param mixed $motifRefus
     */
    public function setMotifRefus($motifRefus): void
    {
        $this->motifRefus = $motifRefus;
    }



    public function getTypeTache() {
        return parent::TacheApprobation;
    }

}