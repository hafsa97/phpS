<?php

namespace App\Repository\Documentaire;

use App\Entity\Documentaire\NotificationDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\DBAL\DBALException;

/**
 * @method NotificationDocument|null find($id, $lockMode = null, $lockVersion = null)
 * @method NotificationDocument|null findOneBy(array $criteria, array $orderBy = null)
 * @method NotificationDocument[]    findAll()
 * @method NotificationDocument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotificationDocumentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NotificationDocument::class);
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function getNotificationUser($user_id)
    {
        $sql="select nf.id , nf.statut , nf.lu , nf.type_notification , nf.utilisateur_concerne_id , nf.document_id  , nf.created_at , d.titre As document  from notification_document nf , document d where nf.document_id = d.id and nf.utilisateur_concerne_id = $user_id and nf.statut=true and nf.lu=false order by nf.created_at DESC";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }

    // /**
    //  * @return NotificationDocument[] Returns an array of NotificationDocument objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NotificationDocument
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
