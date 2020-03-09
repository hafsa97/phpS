<?php

namespace App\Repository\Personnel;

use App\Entity\Personnel\ChampEntrValeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ChampEntrValeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChampEntrValeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChampEntrValeur[]    findAll()
 * @method ChampEntrValeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChampEntrValeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChampEntrValeur::class);
    }

    // /**
    //  * @return ChampEntrValeur[] Returns an array of ChampEntrValeur objects
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
    public function findOneBySomeField($value): ?ChampEntrValeur
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
