<?php

namespace App\Repository\Documentaire;

use App\Entity\Documentaire\SollicitationModificationDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\DBAL\DBALException;

/**
 * @method SollicitationModificationDocument|null find($id, $lockMode = null, $lockVersion = null)
 * @method SollicitationModificationDocument|null findOneBy(array $criteria, array $orderBy = null)
 * @method SollicitationModificationDocument[]    findAll()
 * @method SollicitationModificationDocument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SollicitationModificationDocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SollicitationModificationDocument::class);
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function getAllSollicitationsModification()
    {
        $sql="select sollicitation_modification_document.id , sollicitation_modification_document.titre , sollicitation_modification_document.description , sollicitation_modification_document.date_ajout , app_user.nom as cree_par , sollicitation_modification_document.statut  from sollicitation_modification_document , app_user where  sollicitation_modification_document.cree_par_id = app_user.id;";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }

    // /**
    //  * @return SollicitationModificationDocument[] Returns an array of SollicitationModificationDocument objects
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
    public function findOneBySomeField($value): ?SollicitationModificationDocument
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
