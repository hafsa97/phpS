<?php

namespace App\Entity\Planification;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Planification\PlanificationParDemandeRepository")
 */
class PlanificationParDemande extends planification
{

}
