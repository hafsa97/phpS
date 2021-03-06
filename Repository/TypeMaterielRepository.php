<?php

namespace App\Repository;

use App\Entity\TypeMateriel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeMateriel|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeMateriel|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeMateriel[]    findAll()
 * @method TypeMateriel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeMaterielRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeMateriel::class);
    }

    public function getAllTypesMaterielActifs()
    {
        return $this->createQueryBuilder('type_mat')
            ->where('type_mat.actif = true')
            ->orderBy('type_mat.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function getAllTypesMaterielActifsAndMissing($inactif_typeMateriel_id)
    {
        return $this->createQueryBuilder('type_mat')
            ->where('type_mat.actif = true')
            ->orWhere("type_mat.id = :id")
            ->setParameter('id', $inactif_typeMateriel_id)
            ->orderBy('type_mat.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return TypeMateriel[] Returns an array of TypeMateriel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeMateriel
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
