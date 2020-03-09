<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CodageRepository")
 */
class Codage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $entite_cible;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_entite_cible;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $format_code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $objet;

    /**
     * @ORM\Column(type="integer")
     */
    private $nombreDigitsId;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $portee_identifiant;


    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntiteCible(): ?string
    {
        return $this->entite_cible;
    }

    public function setEntiteCible(string $entite_cible): self
    {
        $this->entite_cible = $entite_cible;

        return $this;
    }

    public function getIdEntiteCible(): ?int
    {
        return $this->id_entite_cible;
    }

    public function setIdEntiteCible(int $id_entite_cible): self
    {
        $this->id_entite_cible = $id_entite_cible;

        return $this;
    }

    public function getFormatCode(): ?string
    {
        return $this->format_code;
    }

    public function setFormatCode(string $format_code): self
    {
        $this->format_code = $format_code;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }

    public function getNombreDigitsId(): ?int
    {
        return $this->nombreDigitsId;
    }

    public function setNombreDigitsId(int $nombreDigitsId): self
    {
        $this->nombreDigitsId = $nombreDigitsId;

        return $this;
    }

    public function getPorteeIdentifiant(): ?string
    {
        return $this->portee_identifiant;
    }

    public function setPorteeIdentifiant(string $portee_identifiant): self
    {
        $this->portee_identifiant = $portee_identifiant;

        return $this;
    }
}
