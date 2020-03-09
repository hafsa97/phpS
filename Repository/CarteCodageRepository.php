<?php

namespace App\Repository;

use App\Entity\CarteCodage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CarteCodage|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarteCodage|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarteCodage[]    findAll()
 * @method CarteCodage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarteCodageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CarteCodage::class);
    }

    // /**
    //  * @return CarteCodage[] Returns an array of CarteCodage objects
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
    public function findOneBySomeField($value): ?CarteCodage
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
