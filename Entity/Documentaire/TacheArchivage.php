<?php


namespace App\Entity\Documentaire;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class TacheArchivage extends TacheDocument
{

    public function getTypeTache() {
        return parent::TacheArchivage;
    }

}