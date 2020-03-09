<?php

namespace App\Entity\Personnel;

use App\Entity\Personnel\FrequenceEvaluation;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Personnel\HabilitationRepository")
 */
class Habilitation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personnel\FrequenceEvaluation", inversedBy="habilitations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $frequence_evaluation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personnel\EvaluationHabilitation", mappedBy="habilitation")
     */
    private $evaluationHabilitations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Personnel\CritereHabilitation", mappedBy="habilitation")
     */
    private $critereHabilitations;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $frequenceReEvaluation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fichePoste;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;

    public function __construct()
    {
        $this->evaluationHabilitations = new ArrayCollection();
        $this->critereHabilitations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFrequenceEvaluation(): ?FrequenceEvaluation
    {
        return $this->frequence_evaluation;
    }

    public function setFrequenceEvaluation(?FrequenceEvaluation $frequence_evaluation): self
    {
        $this->frequence_evaluation = $frequence_evaluation;

        return $this;
    }

    /**
     * @return Collection|EvaluationHabilitation[]
     */
    public function getEvaluationHabilitations(): Collection
    {
        return $this->evaluationHabilitations;
    }

    public function addEvaluationHabilitation(EvaluationHabilitation $evaluationHabilitation): self
    {
        if (!$this->evaluationHabilitations->contains($evaluationHabilitation)) {
            $this->evaluationHabilitations[] = $evaluationHabilitation;
            $evaluationHabilitation->setHabilitation($this);
        }

        return $this;
    }

    public function removeEvaluationHabilitation(EvaluationHabilitation $evaluationHabilitation): self
    {
        if ($this->evaluationHabilitations->contains($evaluationHabilitation)) {
            $this->evaluationHabilitations->removeElement($evaluationHabilitation);
            // set the owning side to null (unless already changed)
            if ($evaluationHabilitation->getHabilitation() === $this) {
                $evaluationHabilitation->setHabilitation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CritereHabilitation[]
     */
    public function getCritereHabilitations(): Collection
    {
        return $this->critereHabilitations;
    }

    public function addCritereHabilitation(CritereHabilitation $critereHabilitation): self
    {
        if (!$this->critereHabilitations->contains($critereHabilitation)) {
            $this->critereHabilitations[] = $critereHabilitation;
            $critereHabilitation->setHabilitation($this);
        }

        return $this;
    }

    public function removeCritereHabilitation(CritereHabilitation $critereHabilitation): self
    {
        if ($this->critereHabilitations->contains($critereHabilitation)) {
            $this->critereHabilitations->removeElement($critereHabilitation);
            // set the owning side to null (unless already changed)
            if ($critereHabilitation->getHabilitation() === $this) {
                $critereHabilitation->setHabilitation(null);
            }
        }

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getFrequenceReEvaluation(): ?int
    {
        return $this->frequenceReEvaluation;
    }

    public function setFrequenceReEvaluation(int $frequenceReEvaluation): self
    {
        $this->frequenceReEvaluation = $frequenceReEvaluation;

        return $this;
    }

    public function getFichePoste(): ?string
    {
        return $this->fichePoste;
    }

    public function setFichePoste(?string $fichePoste): self
    {
        $this->fichePoste = $fichePoste;

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
}
