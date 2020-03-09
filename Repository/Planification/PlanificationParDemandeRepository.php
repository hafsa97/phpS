<?php

namespace App\Repository\Planification;

use App\Entity\Planification\PlanificationParDemande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PlanificationParDemande|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanificationParDemande|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanificationParDemande[]    findAll()
 * @method PlanificationParDemande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanificationParDemandeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PlanificationParDemande::class);
    }

    // /**
    //  * @return PlanificationParDemande[] Returns an array of PlanificationParDemande objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlanificationParDemande
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
