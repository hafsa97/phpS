<?php

namespace App\Repository;

use App\Entity\ContactFournisseur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ContactFournisseur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactFournisseur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactFournisseur[]    findAll()
 * @method ContactFournisseur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactFournisseurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ContactFournisseur::class);
    }

    public function findAllContacts()
    {
        return $this->createQueryBuilder('c')
            ->select('c.id , c.nom , c.adresse , c.telephone  , c.mail , c.web , f.nom As fournisseur ')
            ->leftJoin('c.fournisseur', 'f')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return ContactFournisseur[] Returns an array of ContactFournisseur objects
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
    public function findOneBySomeField($value): ?ContactFournisseur
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
