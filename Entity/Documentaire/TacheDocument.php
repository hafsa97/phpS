<?php


namespace App\Entity\Documentaire;

use App\Entity\User;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Documentaire\TacheDocumentRepository")
 * @ORM\Table(indexes={@ORM\Index(name="type_index", columns={"type_tache"})})
 * @ORM\InheritanceType(value="SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type_tache", type="string", length=30)
 * @ORM\DiscriminatorMap({
 *     "tache_demande_redaction" = "TacheDemandeRedaction",
 *     "tache_demande_modification" = "TacheDemandeModification",
 *     "tache_redaction" = "TacheRedaction",
 *     "tache_verification" = "TacheVerification",
 *     "tache_approbation" = "TacheApprobation",
 *      "tache_diffusion" = "TacheDiffusion",
 *      "tache_archivage" = "TacheArchivage"
 *     })
 */


abstract class TacheDocument
{

    const TacheRedaction = "tache_redaction";
    const TacheVerification = "tache_verification";
    const TacheApprobation = "tache_approbation" ;
    const TacheDiffusion  ="tache_diffusion";
    const TacheArchivage  ="tache_archivage";
    const TacheDemandeRedaction  ="tache_demande_redaction";
    const TacheDemandeModification  ="tache_demande_modification";

    abstract public function getTypeTache();

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateFinPrevu;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCreation;
    /**
     * @ORM\Column(type="date" , nullable=true)
     */
    private $dateRealisation;
    /**
     * @ORM\Column(type="string")
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $realisateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Documentaire\Document", inversedBy="tacheDocuments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $document;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDateRealisation()
    {
        return $this->dateRealisation;
    }

    /**
     * @param mixed $dateRealisation
     */
    public function setDateRealisation($dateRealisation): void
    {
        $this->dateRealisation = $dateRealisation;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getDateFinPrevu()
    {
        return $this->dateFinPrevu;
    }

    /**
     * @param mixed $dateFinPrevu
     */
    public function setDateFinPrevu($dateFinPrevu): void
    {
        $this->dateFinPrevu = $dateFinPrevu;
    }

    /**
     * @return mixed
     */
    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    /**
     * @param mixed $dateCreation
     */
    public function setDateCreation(\DateTimeInterface $dateCreation): void
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return mixed
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * @param mixed $statut
     */
    public function setStatut($statut): void
    {
        $this->statut = $statut;
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

    public function getDocument(): ?Document
    {
        return $this->document;
    }

    public function setDocument(?Document $document): self
    {
        $this->document = $document;

        return $this;
    }


}