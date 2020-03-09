<?php

namespace App\Repository\Personnel;

use App\Entity\Personnel\CritereHabilitation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CritereHabilitation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CritereHabilitation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CritereHabilitation[]    findAll()
 * @method CritereHabilitation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CritereHabilitationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CritereHabilitation::class);
    }

    // /**
    //  * @return CritereHabilitation[] Returns an array of CritereHabilitation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CritereHabilitation
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
