<?php

namespace App\Repository\Documentaire;

use App\Entity\Documentaire\Document;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Document|null find($id, $lockMode = null, $lockVersion = null)
 * @method Document|null findOneBy(array $criteria, array $orderBy = null)
 * @method Document[]    findAll()
 * @method Document[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Document::class);
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function getDocument()
    {
        $sql="select id , titre from document";
        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function getListDocument($id_user)
    {
        $sql = " SELECT  d.titre as titre_document ,d.code, d.statut as statut_document , d.id as id_document , td.nom as type , std.nom as sous_type , t.est_importe ,t.document_importe , t.id as id_tache, document_attestation_user.document_id as attestation_lecture, document_favoris_user.document_id as favoris , string_agg(DISTINCT document_categorie.categorie_id::character(11),' ' ) categorie ,  string_agg(DISTINCT dsc.sous_categorie_id::varchar(11),' ' ) sous_categorie , string_agg(DISTINCT dc.classement_id::varchar(11),' ' ) classement   from  type_document td , sous_type_document std, tache_document t , document d   left join  document_categorie on  d.id= document_categorie.document_id left join document_attestation_user on document_attestation_user.document_id = d.id and document_attestation_user.user_id = $id_user LEFT JOIN document_favoris_user on document_favoris_user.document_id = d.id and document_favoris_user.user_id = $id_user LEFT JOIN document_classement dc on d.id = dc.document_id LEFT JOIN document_sous_categorie dsc on d.id = dsc.document_id where  d.type_id = td.id and d.sous_type_id = std.id and  d.statut = 'Diffusé' and t.document_id = d.id and t.type_tache = 'tache_redaction' and ($id_user in (select document_user.user_id from document_user where document_user.document_id = d.id ) or (select app_user.roles from app_user where app_user.id = $id_user) = 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}' ) group by  d.titre ,d.code, d.statut,d.id ,td.nom,std.nom , t.est_importe,t.document_importe , t.id, document_attestation_user.document_id, document_favoris_user.document_id  ; ";
        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function getUserToAdd($id_document)
    {
        $sql="select id , nom , prenom from app_user where id NOT IN (select user_id from document_user where document_id = $id_document )";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function documentCount()
    {
        $sql="select count(*) from document where document.statut = 'Diffusé'";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }
    /**
     * @return array
     * @throws DBALException
     */
    public function getAttestationLecture($document_id)
    {
        $sql="select  app_user.id as user_id ,app_user.nom , app_user.prenom , document_user.document_id , COALESCE(dau.user_id,0)  as user_attester from  document_user , app_user left join document_attestation_user dau on app_user.id = dau.user_id where document_user.document_id = $document_id and app_user.id = document_user.user_id  ;";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        } catch (DBALException $e) {
        }
    }



    // /**
    //  * @return Document[] Returns an array of Document objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Document
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
