<?php

namespace App\Repository;

use App\Entity\StatutMateriel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StatutMateriel|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatutMateriel|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatutMateriel[]    findAll()
 * @method StatutMateriel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatutMaterielRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StatutMateriel::class);
    }

    public function getAllStatutsMaterielActifs()
    {
        return $this->createQueryBuilder('statut_mat')
            ->where('statut_mat.actif = true')
            ->orderBy('statut_mat.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function getAllStatutsMaterielActifsAndMissing($inactif_statut_id)
    {
        return $this->createQueryBuilder('statut_mat')
            ->where('statut_mat.actif = true')
            ->orWhere("statut_mat.id = :id")
            ->setParameter('id', $inactif_statut_id)
            ->orderBy('statut_mat.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return StatutMateriel[] Returns an array of StatutMateriel objects
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
    public function findOneBySomeField($value): ?StatutMateriel
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
