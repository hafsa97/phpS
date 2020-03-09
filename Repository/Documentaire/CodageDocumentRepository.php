<?php

namespace App\Repository\Documentaire;

use App\Entity\Documentaire\CodageDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CodageDocument|null find($id, $lockMode = null, $lockVersion = null)
 * @method CodageDocument|null findOneBy(array $criteria, array $orderBy = null)
 * @method CodageDocument[]    findAll()
 * @method CodageDocument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CodageDocumentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CodageDocument::class);
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function findCodage(){

        $sql="select codage_document.id , codage_document.format_code , codage_document.increment_version , codage_document.format_version , codage_document.nombre_digit_compteur , codage_document.laboratoire_id , laboratoire.nom as laboratoire from codage_document , laboratoire where codage_document.laboratoire_id = laboratoire.id";

        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();

    }

    // /**
    //  * @return CodageDocument[] Returns an array of CodageDocument objects
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
    public function findOneBySomeField($value): ?CodageDocument
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
