<?php

namespace App\Repository\Personnel;

use App\Entity\Personnel\ChampsParametrable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ChampsParametrable|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChampsParametrable|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChampsParametrable[]    findAll()
 * @method ChampsParametrable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChampsParametrableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChampsParametrable::class);
    }

    // /**
    //  * @return ChampsParametrable[] Returns an array of ChampsParametrable objects
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
    public function findOneBySomeField($value): ?ChampsParametrable
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
