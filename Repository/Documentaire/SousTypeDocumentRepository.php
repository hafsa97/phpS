<?php

namespace App\Repository\Documentaire;

use App\Entity\Documentaire\SousTypeDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SousTypeDocument|null find($id, $lockMode = null, $lockVersion = null)
 * @method SousTypeDocument|null findOneBy(array $criteria, array $orderBy = null)
 * @method SousTypeDocument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SousTypeDocumentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SousTypeDocument::class);
    }
    public function findAll()
    {
        return $this->findBy(array(), array('id' => 'ASC'));
    }

    // /**
    //  * @return SousTypeDocument[] Returns an array of SousTypeDocument objects
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
    public function findOneBySomeField($value): ?SousTypeDocument
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
