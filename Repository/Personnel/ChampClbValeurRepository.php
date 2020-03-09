<?php

namespace App\Repository\Personnel;

use App\Entity\Personnel\ChampClbValeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ChampClbValeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChampClbValeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChampClbValeur[]    findAll()
 * @method ChampClbValeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChampClbValeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChampClbValeur::class);
    }

    // /**
    //  * @return ChampClbValeur[] Returns an array of ChampClbValeur objects
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
    public function findOneBySomeField($value): ?ChampClbValeur
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
