<?php

namespace App\Repository\Documentaire;

use App\Entity\Documentaire\SolicitationStatut;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SolicitationStatut|null find($id, $lockMode = null, $lockVersion = null)
 * @method SolicitationStatut|null findOneBy(array $criteria, array $orderBy = null)
 * @method SolicitationStatut[]    findAll()
 * @method SolicitationStatut[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SolicitationStatutRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SolicitationStatut::class);
    }

    // /**
    //  * @return SolicitationStatut[] Returns an array of SolicitationStatut objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SolicitationStatut
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
