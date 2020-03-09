<?php

namespace App\Repository;

use App\Entity\CriticiteMateriel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CriticiteMateriel|null find($id, $lockMode = null, $lockVersion = null)
 * @method CriticiteMateriel|null findOneBy(array $criteria, array $orderBy = null)
 * @method CriticiteMateriel[]    findAll()
 * @method CriticiteMateriel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CriticiteMaterielRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CriticiteMateriel::class);
    }

    public function getAllCriticitesMaterielActifs()
    {
        return $this->createQueryBuilder('criticite_mat')
            ->where('criticite_mat.actif = true')
            ->orderBy('criticite_mat.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function getAllCriticitesMaterielActifsAndMissing($inactif_criticiteMateriel_id)
    {
        return $this->createQueryBuilder('criticite_mat')
            ->where('criticite_mat.actif = true')
            ->orWhere("criticite_mat.id = :id")
            ->setParameter('id', $inactif_criticiteMateriel_id)
            ->orderBy('criticite_mat.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return CriticiteMateriel[] Returns an array of CriticiteMateriel objects
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
    public function findOneBySomeField($value): ?CriticiteMateriel
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
