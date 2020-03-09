<?php

namespace App\Repository;

use App\Entity\Analyse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Analyse|null find($id, $lockMode = null, $lockVersion = null)
 * @method Analyse|null findOneBy(array $criteria, array $orderBy = null)
 * @method Analyse[]    findAll()
 * @method Analyse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnalyseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Analyse::class);
    }
    public function findAllAnalyses()
    {
        return $this->createQueryBuilder('a')
            ->select('a.id, a.nom, a.description, a.code, p.id As paillasse_id, s.id As secteur_id, l.id As laboratoire_id, p.nom As paillasse, s.nom As secteur, l.nom As laboratoire')
            ->leftJoin('a.paillasse', 'p')
            ->leftJoin('a.secteur', 's')
            ->leftJoin('a.laboratoire', 'l')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function  findAllCodeLabo($id){
        $sql = "SELECT code FROM dictionaire_analyse where laboratoire_id = $id";

        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();


    }


    // /**
    //  * @return Analyse[] Returns an array of Analyse objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Analyse
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
