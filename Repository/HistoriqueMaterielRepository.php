<?php

namespace App\Repository;

use App\Entity\HistoriqueMateriel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HistoriqueMateriel|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoriqueMateriel|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoriqueMateriel[]    findAll()
 * @method HistoriqueMateriel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoriqueMaterielRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HistoriqueMateriel::class);
    }

    // /**
    //  * @return HistoriqueMateriel[] Returns an array of HistoriqueMateriel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HistoriqueMateriel
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
