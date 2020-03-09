<?php

namespace App\Entity\Documentaire;

use App\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Documentaire\HistoriqueDocumentRepository")
 */
class HistoriqueDocument
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
    private $documentImporte;


    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $documentRedige;

    /**
     * @ORM\Column(type="date")
     */
    private $dateRealisation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $action;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Documentaire\Document")
     * @ORM\JoinColumn(nullable=false)
     */
    private $document;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $realisateur;

    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getDocumentImporte()
    {
        return $this->documentImporte;
    }

    /**
     * @param mixed $documentImporte
     */
    public function setDocumentImporte($documentImporte): void
    {
        $this->documentImporte = $documentImporte;
    }


    /**
     * @return mixed
     */
    public function getDocumentRedige()
    {
        return $this->documentRedige;
    }

    /**
     * @param mixed $documentRedige
     */
    public function setDocumentRedige($documentRedige): void
    {
        $this->documentRedige = $documentRedige;
    }
    public function getDateRealisation(): ?\DateTimeInterface
    {
        return $this->dateRealisation;
    }

    public function setDateRealisation(\DateTimeInterface $dateRealisation): self
    {
        $this->dateRealisation = $dateRealisation;

        return $this;
    }

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function setAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function getDocument(): ?Document
    {
        return $this->document;
    }

    public function setDocument(?Document $document): self
    {
        $this->document = $document;

        return $this;
    }

    public function getRealisateur(): ?User
    {
        return $this->realisateur;
    }

    public function setRealisateur(?User $realisateur): self
    {
        $this->realisateur = $realisateur;

        return $this;
    }
}
