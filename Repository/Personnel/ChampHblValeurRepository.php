<?php

namespace App\Repository\Personnel;

use App\Entity\Personnel\ChampHblValeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ChampHblValeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChampHblValeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChampHblValeur[]    findAll()
 * @method ChampHblValeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChampHblValeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChampHblValeur::class);
    }

    // /**
    //  * @return ChampHblValeur[] Returns an array of ChampHblValeur objects
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
    public function findOneBySomeField($value): ?ChampHblValeur
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
