<?php

namespace App\Repository;

use App\Entity\Codage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Codage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Codage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Codage[]    findAll()
 * @method Codage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CodageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Codage::class);
    }

    public function getAllCodages()
    {
        $sql = "SELECT * FROM codage ORDER BY id ASC";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        }
        catch (DBALException $e) {
            return [];
        }
    }

    // /**
    //  * @return Codage[] Returns an array of Codage objects
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
    public function findOneBySomeField($value): ?Codage
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
