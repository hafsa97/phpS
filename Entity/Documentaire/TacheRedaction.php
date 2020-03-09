<?php


namespace App\Entity\Documentaire;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class TacheRedaction extends TacheDocument
{

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $documentRedige;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $documentImporte;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estImporte;

    /**
     * @return mixed
     */
    public function getEstImporte()
    {
        return $this->estImporte;
    }

    /**
     * @param mixed $estImporte
     */
    public function setEstImporte($estImporte): void
    {
        $this->estImporte = $estImporte;
    }

    public function getTypeTache() {
        return parent::TacheRedaction;
    }

    public function getDocumentRedige(): ?string
    {
        return $this->documentRedige;
    }

    public function setDocumentRedige(?string $documentRedige): self
    {
        $this->documentRedige = $documentRedige;

        return $this;
    }

    public function getDocumentImporte(): ?string
    {
        return $this->documentImporte;
    }

    public function setDocumentImporte(?string $documentImporte): self
    {
        $this->documentImporte = $documentImporte;

        return $this;
    }
}