<?php

namespace App\Repository\Documentaire;

use App\Entity\Documentaire\SolicitationDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SolicitationDocument|null find($id, $lockMode = null, $lockVersion = null)
 * @method SolicitationDocument|null findOneBy(array $criteria, array $orderBy = null)
 * @method SolicitationDocument[]    findAll()
 * @method SolicitationDocument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SolicitationDocumentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SolicitationDocument::class);
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function getAllSolicitations()
    {
        $sql="select solicitation_document.id , solicitation_document.titre , solicitation_document.description , solicitation_document.date_ajout , app_user.nom as cree_par , solicitation_statut.etat,solicitation_statut.motif_refus , m.nom as materiel , tm.titre as tache_maintenance  from solicitation_document left join  materiel m on solicitation_document.materiel_id = m.id left join tache_maintenance tm on solicitation_document.tache_maintenance_id = tm.id , solicitation_statut , app_user where solicitation_document.id = solicitation_statut.solicitation_id and  solicitation_document.ajoute_par_id = app_user.id";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }

    public function findSollicitationsEnCours(){
        $sql="select solicitation_document.id , solicitation_document.titre  from solicitation_document , solicitation_statut left outer join tache_document on solicitation_statut.solicitation_id = tache_document.solicitation_id where tache_document.solicitation_id is null and solicitation_document.id = solicitation_statut.solicitation_id and solicitation_statut.etat not in ('Refusée')";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }

    // /**
    //  * @return SolicitationDocument[] Returns an array of SolicitationDocument objects
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
    public function findOneBySomeField($value): ?SolicitationDocument
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
