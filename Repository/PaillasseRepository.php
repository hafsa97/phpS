<?php

namespace App\Repository;

use App\Entity\Paillasse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Paillasse|null find($id, $lockMode = null, $lockVersion = null)
 * @method Paillasse|null findOneBy(array $criteria, array $orderBy = null)
 * @method Paillasse[]    findAll()
 * @method Paillasse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaillasseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Paillasse::class);
    }

    public function getAllPaillasses()
    {
        $sql = "SELECT * FROM paillasse ORDER BY id ASC";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        }
        catch (DBALException $e) {
            return [];
        }
    }

    // /**
    //  * @return Paillasse[] Returns an array of Paillasse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Paillasse
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
