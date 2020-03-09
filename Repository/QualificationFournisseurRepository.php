<?php

namespace App\Repository;

use App\Entity\QualificationFournisseur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method QualificationFournisseur|null find($id, $lockMode = null, $lockVersion = null)
 * @method QualificationFournisseur|null findOneBy(array $criteria, array $orderBy = null)
 * @method QualificationFournisseur[]    findAll()
 * @method QualificationFournisseur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QualificationFournisseurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, QualificationFournisseur::class);
    }

    public function getAllQualificationsFrsActifs()
    {
        return $this->createQueryBuilder('qual_frs')
            ->where('qual_frs.actif = true')
            ->orderBy('qual_frs.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function getAllQualificationsFrsActifsAndMissing($inactif_qualification_id)
    {
        return $this->createQueryBuilder('qual_frs')
            ->where('qual_frs.actif = true')
            ->orWhere("qual_frs.id = :id")
            ->setParameter('id', $inactif_qualification_id)
            ->orderBy('qual_frs.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return QualificationFournisseur[] Returns an array of QualificationFournisseur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?QualificationFournisseur
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
