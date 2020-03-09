<?php

namespace App\Repository\Personnel;

use App\Entity\Personnel\FrequenceEvaluation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method FrequenceEvaluation|null find($id, $lockMode = null, $lockVersion = null)
 * @method FrequenceEvaluation|null findOneBy(array $criteria, array $orderBy = null)
 * @method FrequenceEvaluation[]    findAll()
 * @method FrequenceEvaluation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FrequenceEvaluationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FrequenceEvaluation::class);
    }

    // /**
    //  * @return FrequenceEvaluation[] Returns an array of FrequenceEvaluation objects
    //  */
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
    public function findOneBySomeField($value): ?FrequenceEvaluation
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
