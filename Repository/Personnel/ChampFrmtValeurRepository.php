<?php

namespace App\Repository\Personnel;

use App\Entity\Personnel\ChampFrmtValeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ChampFrmtValeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChampFrmtValeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChampFrmtValeur[]    findAll()
 * @method ChampFrmtValeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChampFrmtValeurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChampFrmtValeur::class);
    }

    // /**
    //  * @return ChampFrmtValeur[] Returns an array of ChampFrmtValeur objects
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
    public function findOneBySomeField($value): ?ChampFrmtValeur
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
