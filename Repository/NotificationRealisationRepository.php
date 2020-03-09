<?php

namespace App\Repository;

use App\Entity\NotificationRealisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method NotificationRealisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method NotificationRealisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method NotificationRealisation[]    findAll()
 * @method NotificationRealisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NotificationRealisationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, NotificationRealisation::class);
    }

    public function findNotificationsUser($id_user) : array
    {

        $sql = "SELECT notification_realisation.realisation_id, notification_realisation.utilisateur_concerne_id, notification_realisation.statut, notification_realisation.lu, notification_realisation.type_notification,notification_realisation.created_at, tache_maintenance.titre AS tache_maintenance , materiel.nom AS materiel  from notification_realisation, realisation_tache_maintenance,materiel,tache_maintenance where notification_realisation.utilisateur_concerne_id = $id_user And notification_realisation.statut=true and notification_realisation.lu=false AND notification_realisation.realisation_id = realisation_tache_maintenance.id AND realisation_tache_maintenance.materiel_id = materiel.id AND realisation_tache_maintenance.tache_maintenance_id = tache_maintenance.id order by notification_realisation.created_at DESC  ";
        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }
    public function findNotificationsUserIndex($id_user) : array
    {

        $sql = "SELECT notification_realisation.id_notification, notification_realisation.realisation_id, notification_realisation.utilisateur_concerne_id, notification_realisation.statut, notification_realisation.lu, notification_realisation.type_notification,notification_realisation.created_at, tache_maintenance.titre AS tache_maintenance , materiel.nom AS materiel  from notification_realisation, realisation_tache_maintenance,materiel,tache_maintenance where notification_realisation.utilisateur_concerne_id = $id_user AND notification_realisation.realisation_id = realisation_tache_maintenance.id AND realisation_tache_maintenance.materiel_id = materiel.id AND realisation_tache_maintenance.tache_maintenance_id = tache_maintenance.id order by notification_realisation.created_at DESC  ";
        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }
    // /**
    //  * @return NotificationRealisation[] Returns an array of NotificationRealisation objects
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
    public function findOneBySomeField($value): ?NotificationRealisation
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
