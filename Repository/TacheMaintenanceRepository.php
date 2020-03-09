<?php

namespace App\Repository;

use App\Entity\TacheMaintenance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TacheMaintenance|null find($id, $lockMode = null, $lockVersion = null)
 * @method TacheMaintenance|null findOneBy(array $criteria, array $orderBy = null)
 * @method TacheMaintenance[]    findAll()
 * @method TacheMaintenance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TacheMaintenanceRepository extends ServiceEntityRepository
{



    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TacheMaintenance::class);
    }
    /**
     * @return array
     * @throws DBALException
     */
    public function findAllTaches() : array
    {

        $sql = "SELECT tache_maintenance.id as id , string_agg(materiel_tache_maintenance.materiel_id::varchar(11) ,' ' ) materiels  , tache_maintenance.titre ,tache_maintenance.statut,tache_maintenance.duree_en_jours,tache_maintenance.est_interne, tache_maintenance.created_at, tache_maintenance.prochaine_execution,  planification.notifier_avant, planification.nombre_de_repetitions, planification.intervalle_en_minutes, planification.type_planification , planification.interval_jours , planification.interval_semaines, planification.jours,planification.mois, planification.jours_du_mois, planification.jours_de_la_semaine , planification.numero_de_la_semaine , planification.type_plan_par_mois, app_user.username  FROM planification JOIN tache_maintenance  ON tache_maintenance.planification_id = planification.id  left JOIN app_user ON tache_maintenance.user_id = app_user.id left join materiel_tache_maintenance on tache_maintenance.id = materiel_tache_maintenance.tache_maintenance_id GROUP BY tache_maintenance.id, planification.id , app_user.id   ";
        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();

    }

    public function findAllTachesParDemande() : array
    {

        $sql = "SELECT tache_maintenance.id as id , string_agg(materiel_tache_maintenance.materiel_id::varchar(11),' ' ) materiels  , tache_maintenance.titre ,tache_maintenance.statut,tache_maintenance.duree_en_jours,tache_maintenance.est_interne, tache_maintenance.created_at, tache_maintenance.prochaine_execution,  planification.notifier_avant, planification.nombre_de_repetitions, planification.intervalle_en_minutes, planification.type_planification , planification.interval_jours , planification.interval_semaines, planification.jours,planification.mois, planification.jours_du_mois, planification.jours_de_la_semaine , planification.numero_de_la_semaine , planification.type_plan_par_mois, app_user.username  FROM planification  JOIN tache_maintenance  ON tache_maintenance.planification_id = planification.id  left JOIN app_user ON tache_maintenance.user_id = app_user.id left join materiel_tache_maintenance on tache_maintenance.id = materiel_tache_maintenance.tache_maintenance_id where planification.type_planification = 'PAR_DEMANDE' GROUP BY tache_maintenance.id, planification.id , app_user.id";

        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function prochaineTaches() : array
    {

        $sql = "select id,titre , prochaine_execution from tache_maintenance where prochaine_execution >= now() order by prochaine_execution Asc limit 5";

        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }


    // /**
    //  * @return TacheMaintenance[] Returns an array of TacheMaintenance objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TacheMaintenance
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
