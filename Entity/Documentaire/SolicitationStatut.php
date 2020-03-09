<?php

namespace App\Entity\Documentaire;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Documentaire\SolicitationStatutRepository")
 */
class SolicitationStatut
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $motifRefus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Documentaire\SolicitationDocument", inversedBy="solicitationStatut", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $solicitation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotifRefus(): ?string
    {
        return $this->motifRefus;
    }

    public function setMotifRefus(?string $motifRefus): self
    {
        $this->motifRefus = $motifRefus;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getSolicitation(): ?SolicitationDocument
    {
        return $this->solicitation;
    }

    public function setSolicitation(SolicitationDocument $solicitation): self
    {
        $this->solicitation = $solicitation;

        return $this;
    }
}
