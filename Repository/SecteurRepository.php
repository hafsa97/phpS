<?php

namespace App\Repository;

use App\Entity\Secteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Secteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Secteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Secteur[]    findAll()
 * @method Secteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SecteurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Secteur::class);
    }

    public function getAllSecteurs()
    {
        $sql = "SELECT * FROM secteur ORDER BY id ASC";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        }
        catch (DBALException $e) {
            return [];
        }
    }

    // /**
    //  * @return Secteur[] Returns an array of Secteur objects
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
    public function findOneBySomeField($value): ?Secteur
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
