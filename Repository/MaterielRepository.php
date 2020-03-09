<?php

namespace App\Repository;

use App\Entity\Materiel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Materiel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Materiel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Materiel[]    findAll()
 * @method Materiel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaterielRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Materiel::class);
    }

    public function findAllMateriel(): array
    {
        return $this->createQueryBuilder('m')
            ->select('m.id','m.nom' , 'm.description' , 'p.nom AS paillasse', 'c.nom AS criticite' , 'f.nom AS fournisseur', 'm.numeroDeSerie', 'm.image', 'm.dateMiseEnService','m.code' ,'s.nom As statut', 't.nom As type', 'm.dateCreation','l.nom As laboratoire','sc.nom as secteur')
            ->leftJoin('m.paillasse', 'p')
            ->leftJoin('m.criticiteMateriel', 'c')
            ->leftJoin('m.fournisseur', 'f')
            ->leftJoin('m.contactFournisseur', 'cf')
            ->leftJoin('m.statutMateriel', 's')
            ->leftJoin('m.typeMateriel', 't')
            ->leftJoin('m.laboratoire', 'l')
            ->leftJoin('m.secteur', 'sc')

            ->getQuery()
            ->getResult();
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function findMaterielsUser($user)  : array
    {
        $sql = "SELECT id, nom from materiel where id in (select materiel_id from user_realisation_materiel where user_id = $user)";
        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }



    /**
     * @return array
     * @throws DBALException
     */
    public function materielsName()  : array
    {
        $sql ="SELECT id, nom from materiel  ";
        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function materielsStats()  : array
    {
        $sql ="select count(m.id) , s.nom  from statut_materiel s left join materiel m   on m.statut_materiel_id = s.id group by  s.nom order by s.nom asc ; ";
        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }
}
