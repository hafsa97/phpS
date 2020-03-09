<?php

namespace App\Repository;

use App\Entity\FonctionsContactFrs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Collection;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FonctionsContactFrs|null find($id, $lockMode = null, $lockVersion = null)
 * @method FonctionsContactFrs|null findOneBy(array $criteria, array $orderBy = null)
 * @method FonctionsContactFrs[]    findAll()
 * @method FonctionsContactFrs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FonctionsContactFrsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FonctionsContactFrs::class);
    }

    public function getAllFonctionsContactsFrsActifs() {
        return $this->createQueryBuilder('fonc_con_frs')
            ->where('fonc_con_frs.actif = true')
            ->orderBy('fonc_con_frs.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function getAllFonctionsContactsFrsActifsAndMissing(array $inactifs_fonctions_ids)
    {
        return $this->createQueryBuilder('fonc_con_frs')
            ->where('fonc_con_frs.actif = true')
            ->orWhere("fonc_con_frs.id IN (:ids)")
            ->setParameter("ids", $inactifs_fonctions_ids)
            ->orderBy('fonc_con_frs.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

//     /**
//      * @return FonctionsContactFrs[] Returns an array of FonctionsContactFrs objects
//      */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FonctionsContactFrs
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
