<?php

namespace App\Repository;

use App\Entity\RealisationTacheMaintenance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RealisationTacheMaintenance|null find($id, $lockMode = null, $lockVersion = null)
 * @method RealisationTacheMaintenance|null findOneBy(array $criteria, array $orderBy = null)
 * @method RealisationTacheMaintenance[]    findAll()
 * @method RealisationTacheMaintenance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RealisationTacheMaintenanceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RealisationTacheMaintenance::class);
    }

    public function findAllRealisations()
    {
        return $this->createQueryBuilder('r')
            ->select('r.id , r.nom ,  r.datePlanification ,r.statut , r.dateRealisation, r.dateEcheance ,  u.username As createur , m.nom As materiel , m.id As materiel_id ')
            ->leftJoin('r.realisateur', 'u')
            ->leftJoin('r.materiel', 'm')
//            ->where('r.datePlanification <= CURRENT_TIMESTAMP()')
            ->getQuery()
            ->getResult();
    }

    public function findRealisationUser($id_user) : array
    {

        $sql = "SELECT realisation_tache_maintenance.id as id ,realisation_tache_maintenance.nom , tache_maintenance.description,tache_maintenance.id as tache_id, realisation_tache_maintenance.date_planification , realisation_tache_maintenance.date_echeance , materiel.nom as materiel, materiel.id as materiel_id from  materiel , realisation_tache_maintenance,tache_maintenance where realisation_tache_maintenance.tache_maintenance_id in (select materiel_tache_maintenance.tache_maintenance_id from materiel_tache_maintenance where materiel_tache_maintenance.materiel_id in (select user_realisation_materiel.materiel_id from user_realisation_materiel where  user_realisation_materiel.user_id= $id_user) ) and  materiel.id = realisation_tache_maintenance.materiel_id and tache_maintenance.id = realisation_tache_maintenance.tache_maintenance_id and realisation_tache_maintenance.statut = 'En attente'   ";

        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }

    public function findRealisationAdmin()
    {
        $sql = "SELECT realisation_tache_maintenance.id as id ,realisation_tache_maintenance.nom , tache_maintenance.description,tache_maintenance.id as tache_id, realisation_tache_maintenance.date_planification , realisation_tache_maintenance.date_echeance , materiel.nom as materiel, materiel.id as materiel_id , realisation_tache_maintenance.statut from  materiel , realisation_tache_maintenance,tache_maintenance where realisation_tache_maintenance.statut = 'En attente' and tache_maintenance.id = realisation_tache_maintenance.tache_maintenance_id and  materiel.id = realisation_tache_maintenance.materiel_id   ";

        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }

    public function findUsersTache($id_materiel) : array
    {

        $sql = "select id, nom , prenom from app_user where app_user.id in (select user_id from user_realisation_materiel where user_realisation_materiel.materiel_id = $id_materiel)";

        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }

    public function findTacheARealiser($id_user)
    {
        $sql = "SELECT realisation_tache_maintenance.id as id ,realisation_tache_maintenance.nom ,realisation_tache_maintenance.date_realisation , realisation_tache_maintenance.rapport_realisation, tache_maintenance.id as tache_id, realisation_tache_maintenance.statut, realisation_tache_maintenance.date_planification , realisation_tache_maintenance.date_echeance , materiel.nom as materiel, materiel.id as materiel_id from  materiel , realisation_tache_maintenance,tache_maintenance where  materiel.id = realisation_tache_maintenance.materiel_id and tache_maintenance.id = realisation_tache_maintenance.tache_maintenance_id and realisation_tache_maintenance.statut = 'En cours' and realisation_tache_maintenance.realisateur_id = $id_user ";

        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }
    public function findTacheSuivi()
    {
        $sql = "SELECT realisation_tache_maintenance.id as id , realisation_tache_maintenance.piece_jointe ,realisation_tache_maintenance.nom ,realisation_tache_maintenance.date_realisation ,realisation_tache_maintenance.date_affectation ,tache_maintenance.id as tache_id, realisation_tache_maintenance.rapport_realisation, realisation_tache_maintenance.statut, realisation_tache_maintenance.date_planification , realisation_tache_maintenance.date_echeance, app_user.username , materiel.nom as materiel, materiel.id as materiel_id from  materiel , realisation_tache_maintenance,tache_maintenance,app_user where  materiel.id = realisation_tache_maintenance.materiel_id and tache_maintenance.id = realisation_tache_maintenance.tache_maintenance_id and realisation_tache_maintenance.statut not in ('En attente') and realisation_tache_maintenance.realisateur_id = app_user.id ";

        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }

    public function findTacheARealiserMateriel($id_user,$id_materiel)
    {
        $sql = "SELECT realisation_tache_maintenance.id as id ,realisation_tache_maintenance.nom ,realisation_tache_maintenance.date_realisation , realisation_tache_maintenance.rapport_realisation, tache_maintenance.id as tache_id, realisation_tache_maintenance.statut, realisation_tache_maintenance.date_planification , realisation_tache_maintenance.date_echeance , materiel.nom as materiel, materiel.id as materiel_id from  materiel , realisation_tache_maintenance,tache_maintenance where  materiel.id = realisation_tache_maintenance.materiel_id and tache_maintenance.id = realisation_tache_maintenance.tache_maintenance_id and realisation_tache_maintenance.statut = 'En cours' and realisation_tache_maintenance.realisateur_id = $id_user and realisation_tache_maintenance.materiel_id = $id_materiel ";

        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }

    public function RealisationsStats()
    {
        $sql = "select count(id), statut from realisation_tache_maintenance group by statut";

        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }




    // /**
    //  * @return RealisationTacheMaintenance[] Returns an array of RealisationTacheMaintenance objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RealisationTacheMaintenance
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
