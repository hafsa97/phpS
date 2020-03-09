<?php

namespace App\Repository\Documentaire;

use App\Entity\Documentaire\ParametrageDiffusion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParametrageDiffusion|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParametrageDiffusion|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParametrageDiffusion[]    findAll()
 * @method ParametrageDiffusion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParametrageDiffusionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParametrageDiffusion::class);
    }

    public function deleteDiffusion(){
        $query = $this->createQueryBuilder('e')
            ->delete()
            ->getQuery()
            ->execute();
        return $query;
    }
    public  function getParametrageDiffusion(){

    }

    // /**
    //  * @return ParametrageDiffusion[] Returns an array of ParametrageDiffusion objects
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
    public function findOneBySomeField($value): ?ParametrageDiffusion
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
