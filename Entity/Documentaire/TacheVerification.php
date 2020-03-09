<?php


namespace App\Entity\Documentaire;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class TacheVerification extends TacheDocument
{

    /**
     * @ORM\Column(type="boolean")
     */
    private $estVerifie;

    /**
     * @ORM\Column(type="string")
     */
    private $motifRefus;

    /**
     * @return mixed
     */
    public function getEstVerifie()
    {
        return $this->estVerifie;
    }

    /**
     * @param mixed $estVerifie
     */
    public function setEstVerifie($estVerifie): void
    {
        $this->estVerifie = $estVerifie;
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
        return parent::TacheVerification;
    }

}