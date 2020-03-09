<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FournisseurRepository")
 * @UniqueEntity("nom")
 */
class Fournisseur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $adresse;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\QualificationFournisseur")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $qualification;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank()
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     *
     */
    private $web;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     *
     */
    private $telSav;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     *
     */
    private $mailSav;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     *
     */
    private $webSav;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     *
     */
    private $fax;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     *
     */
    private $numeroClient;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ContactFournisseur", mappedBy="fournisseur", cascade={"persist"})
     */
    private $contacts;

    /**
     * @ORM\Column(type="string", length=10, nullable=false)
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $pays;

    public function __construct()
    {
        $this->contacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getQualification(): ?QualificationFournisseur
    {
        return $this->qualification;
    }

    public function setQualification(?QualificationFournisseur $qualification): self
    {
        $this->qualification = $qualification;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getWeb(): ?string
    {
        return $this->web;
    }

    public function setWeb(?string $web): self
    {
        $this->web = $web;

        return $this;
    }

    public function getTelSav(): ?string
    {
        return $this->telSav;
    }

    public function setTelSav(?string $telSav): self
    {
        $this->telSav = $telSav;

        return $this;
    }

    public function getMailSav(): ?string
    {
        return $this->mailSav;
    }

    public function setMailSav(?string $mailSav): self
    {
        $this->mailSav = $mailSav;

        return $this;
    }

    public function getWebSav(): ?string
    {
        return $this->webSav;
    }

    public function setWebSav(?string $webSav): self
    {
        $this->webSav = $webSav;

        return $this;
    }

    public function getFax(): ?string
    {
        return $this->fax;
    }

    public function setFax(?string $fax): self
    {
        $this->fax = $fax;

        return $this;
    }

    public function getNumeroClient(): ?string
    {
        return $this->numeroClient;
    }

    public function setNumeroClient(?string $numeroClient): self
    {
        $this->numeroClient = $numeroClient;

        return $this;
    }

    /**
     * @return Collection|ContactFournisseur[]
     */
    public function getContacts(): Collection
    {
        return $this->contacts;
    }

    public function addContact(ContactFournisseur $contact): self
    {
        if (!$this->contacts->contains($contact)) {
            $this->contacts[] = $contact;
            $contact->setFournisseur($this);
        }

        return $this;
    }

    public function removeContact(ContactFournisseur $contact): self
    {
        if ($this->contacts->contains($contact)) {
            $this->contacts->removeElement($contact);
            // set the owning side to null (unless already changed)
            if ($contact->getFournisseur() === $this) {
                $contact->setFournisseur(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->nom;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }
}
