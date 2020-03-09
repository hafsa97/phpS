<?php

namespace App\Repository;

use App\Entity\Sel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Sel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sel[]    findAll()
 * @method Sel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Sel::class);
    }

    public function getAllSels()
    {
        $sql = "SELECT * FROM sel ORDER BY id ASC";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        }
        catch (DBALException $e) {
            return [];
        }
    }

    // /**
    //  * @return Sel[] Returns an array of Sel objects
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
    public function findOneBySomeField($value): ?Sel
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
