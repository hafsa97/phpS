<?php


namespace App\Repository\Documentaire;

use App\Entity\Documentaire\TacheDocument;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TacheDocument|null find($id, $lockMode = null, $lockVersion = null)
 * @method TacheDocument|null findOneBy(array $criteria, array $orderBy = null)
 * @method TacheDocument[]    findAll()
 * @method TacheDocument[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TacheDocumentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TacheDocument::class);
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function getNombreTache()
    {
        $sql = "select count(*) from tache_document where type_tache = 'tache_redaction' ";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function getAllTaches()
    {
        $sql = " SELECT t.id , t.nom as nom_tache , t.statut as statut_tache ,t.type_tache , t.est_importe , t.date_fin_prevu ,t.document_importe, t.date_creation , d.titre as titre_document , d.statut as statut_document , d.id as id_document , td.nom as type , std.nom as sous_type , (app_user.nom , app_user.prenom) as realisateur  from tache_document t , document d , type_document td , sous_type_document std , app_user where t.document_id = d.id and d.type_id = td.id and d.sous_type_id = std.id and t.realisateur_id = app_user.id; ";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function getDocumentRedaction($id_document)
    {
        $sql = " SELECT t.id , t.nom as nom_tache , t.statut as statut_tache , t.document_importe,t.est_importe, t.date_fin_prevu , t.date_creation , d.titre as titre_document , d.statut as statut_document , d.id as id_document , d.chemin , td.nom as type , std.nom as sous_type   from tache_document t , document d , type_document td , sous_type_document std where t.document_id = d.id and d.type_id = td.id and d.sous_type_id = std.id and t.document_id = $id_document and  t.type_tache = 'tache_redaction';";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }


    /**
     * @return array
     * @throws DBALException
     */
    public function getTachesRedactions($id_user)
    {
        $sql = " SELECT t.id , t.nom as nom_tache , t.statut as statut_tache , t.document_importe,t.est_importe, t.date_fin_prevu , t.date_creation , d.titre as titre_document , d.statut as statut_document , d.id as id_document , d.chemin , td.nom as type , std.nom as sous_type   from tache_document t , document d , type_document td , sous_type_document std where t.document_id = d.id and d.type_id = td.id and d.sous_type_id = std.id and t.realisateur_id = $id_user and  t.type_tache = 'tache_redaction';";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function getTachesVerifications($id_user)
    {
        $sql = " SELECT t.id , t.nom as nom_tache , t.statut as statut_tache , t.document_importe,t.est_importe, t.date_fin_prevu , t.date_creation , d.titre as titre_document , d.statut as statut_document , d.id as id_document , d.chemin , td.nom as type , std.nom as sous_type   from tache_document t , document d , type_document td , sous_type_document std where t.document_id = d.id and d.type_id = td.id and d.sous_type_id = std.id and t.realisateur_id = $id_user and  t.type_tache = 'tache_verification';";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function getTachesApprobations($id_user)
    {
        $sql = " SELECT t.id , t.nom as nom_tache , t.statut as statut_tache , t.document_importe,t.est_importe, t.date_fin_prevu , t.date_creation , d.titre as titre_document , d.statut as statut_document , d.id as id_document , d.chemin , td.nom as type , std.nom as sous_type   from tache_document t , document d , type_document td , sous_type_document std where t.document_id = d.id and d.type_id = td.id and d.sous_type_id = std.id and t.realisateur_id = $id_user and  t.type_tache = 'tache_approbation';";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function getTachesDiffusions($id_user)
    {
        $sql = " SELECT t.id , t.nom as nom_tache , t.statut as statut_tache , t.document_importe,t.est_importe, t.date_fin_prevu , t.date_creation , d.titre as titre_document , d.statut as statut_document , d.id as id_document , d.chemin , td.nom as type , std.nom as sous_type   from tache_document t , document d , type_document td , sous_type_document std where t.document_id = d.id and d.type_id = td.id and d.sous_type_id = std.id and t.realisateur_id = $id_user and  t.type_tache = 'tache_diffusion';";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }


}