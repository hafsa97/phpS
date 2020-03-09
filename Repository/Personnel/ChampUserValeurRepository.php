<?php

namespace App\Repository\Personnel;

use App\Entity\Personnel\ChampUserValeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ChampUserValeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChampUserValeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChampUserValeur[]    findAll()
 * @method ChampUserValeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChampUserValeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChampUserValeur::class);
    }

    // /**
    //  * @return ChampUserValeur[] Returns an array of ChampUserValeur objects
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
    public function findOneBySomeField($value): ?ChampUserValeur
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
