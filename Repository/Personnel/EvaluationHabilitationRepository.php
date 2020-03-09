<?php

namespace App\Repository\Personnel;

use App\Entity\Personnel\EvaluationHabilitation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EvaluationHabilitation|null find($id, $lockMode = null, $lockVersion = null)
 * @method EvaluationHabilitation|null findOneBy(array $criteria, array $orderBy = null)
 * @method EvaluationHabilitation[]    findAll()
 * @method EvaluationHabilitation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvaluationHabilitationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EvaluationHabilitation::class);
    }

    // /**
    //  * @return EvaluationHabilitation[] Returns an array of EvaluationHabilitation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EvaluationHabilitation
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
