<?php

namespace App\Repository\Documentaire;

use App\Entity\Documentaire\StatutDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StatutDocument|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatutDocument|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatutDocument[]    findAll()
 * @method StatutDocument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatutDocumentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StatutDocument::class);
    }

    // /**
    //  * @return StatutDocument[] Returns an array of StatutDocument objects
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
    public function findOneBySomeField($value): ?StatutDocument
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
