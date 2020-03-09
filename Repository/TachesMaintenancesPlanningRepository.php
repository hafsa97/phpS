<?php

namespace App\Repository;

use App\Entity\TachesMaintenancesPlanning;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TachesMaintenancesPlanning|null find($id, $lockMode = null, $lockVersion = null)
 * @method TachesMaintenancesPlanning|null findOneBy(array $criteria, array $orderBy = null)
 * @method TachesMaintenancesPlanning[]    findAll()
 * @method TachesMaintenancesPlanning[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TachesMaintenancesPlanningRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TachesMaintenancesPlanning::class);
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function findProchainesExec(){
        $sql="Select taches_maintenances_planning.tache_maintenance_id as tacheMaintenance , taches_maintenances_planning.date_planification as datePlanification,string_agg(taches_maintenances_planning_materiel.materiel_id::character,' ' ) materiels,  tache_maintenance.titre  from tache_maintenance, taches_maintenances_planning left join taches_maintenances_planning_materiel on taches_maintenances_planning.id = taches_maintenances_planning_materiel.taches_maintenances_planning_id where tache_maintenance.id = taches_maintenances_planning.tache_maintenance_id  group by taches_maintenances_planning.tache_maintenance_id , taches_maintenances_planning.date_planification,tache_maintenance.titre   ; ";
        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function findProchainesExecUser($user_id){
        $sql="Select taches_maintenances_planning.tache_maintenance_id as tacheMaintenance , taches_maintenances_planning.date_planification as datePlanification,string_agg(taches_maintenances_planning_materiel.materiel_id::character,' ' ) materiels,  tache_maintenance.titre  from tache_maintenance, taches_maintenances_planning left join taches_maintenances_planning_materiel on taches_maintenances_planning.id = taches_maintenances_planning_materiel.taches_maintenances_planning_id where tache_maintenance.id = taches_maintenances_planning.tache_maintenance_id  group by taches_maintenances_planning.tache_maintenance_id , taches_maintenances_planning.date_planification,tache_maintenance.titre   ; ";
        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }

    public function removeAllRows()
    {
        $sql = "DELETE FROM taches_maintenances_planning";
        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();

    }

    // /**
    //  * @return TachesMaintenancesPlanning[] Returns an array of TachesMaintenancesPlanning objects
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
    public function findOneBySomeField($value): ?TachesMaintenancesPlanning
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
