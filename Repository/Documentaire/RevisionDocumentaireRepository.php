<?php

namespace App\Repository\Documentaire;

use App\Entity\Documentaire\RevisionDocumentaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RevisionDocumentaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method RevisionDocumentaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method RevisionDocumentaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RevisionDocumentaireRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RevisionDocumentaire::class);
    }
    public function findAll()
    {
        return $this->findBy(array(), array('id' => 'ASC'));
    }

    // /**
    //  * @return RevisionDocumentaire[] Returns an array of RevisionDocumentaire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RevisionDocumentaire
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
