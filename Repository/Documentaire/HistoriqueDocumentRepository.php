<?php

namespace App\Repository\Documentaire;

use App\Entity\Documentaire\HistoriqueDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\DBAL\DBALException;

/**
 * @method HistoriqueDocument|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoriqueDocument|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoriqueDocument[]    findAll()
 * @method HistoriqueDocument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoriqueDocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoriqueDocument::class);
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function getHistoriqueDocument($document_id)
    {
        $sql = "select * from historique_document where document_id = $document_id";
        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }


     /**
      * @return HistoriqueDocument[] Returns an array of HistoriqueDocument objects
      */

    public function findHistoriqueDocument($document_id)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.document = :val')
            ->setParameter('val', $document_id)
            ->orderBy('h.id', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?HistoriqueDocument
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
