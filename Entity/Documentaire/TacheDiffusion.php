<?php


namespace App\Entity\Documentaire;

use Doctrine\ORM\Mapping as ORM;
use DateTimeInterface;

/**
 * @ORM\Entity
 */

class TacheDiffusion extends  TacheDocument
{

    /**
     * @ORM\Column(type="boolean")
     */
    private $estDiffuse;

    /**
     * @ORM\Column(type="date")
     */
    private $dateApplication;

    /**
     * @return mixed
     */
    public function getEstDiffuse()
    {
        return $this->estDiffuse;
    }

    /**
     * @param mixed $estDiffuse
     */
    public function setEstDiffuse($estDiffuse): void
    {
        $this->estDiffuse = $estDiffuse;
    }

    /**
     * @return mixed
     */
    public function getDateApplication(): ?\DateTimeInterface
    {
        return $this->dateApplication;
    }

    /**
     * @param mixed $dateApplication
     */
    public function setDateApplication(\DateTimeInterface $dateApplication): void
    {
        $this->dateApplication = $dateApplication;
    }

    public function getTypeTache() {
        return parent::TacheDiffusion;
    }

}