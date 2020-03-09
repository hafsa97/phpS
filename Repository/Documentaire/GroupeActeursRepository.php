<?php

namespace App\Repository\Documentaire;

use App\Entity\Documentaire\GroupeActeurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GroupeActeurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupeActeurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupeActeurs[]    findAll()
 * @method GroupeActeurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupeActeursRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GroupeActeurs::class);
    }

    public function deleteAllActors(){
        $query = $this->createQueryBuilder('e')
            ->delete()
            ->getQuery()
            ->execute();
        return $query;
    }

    /**
     * @return array
     * @throws DBALException
     */
    public function  findAllActors(){
        $sql = "SELECT groupe_acteurs.id, groupe_acteurs.type, groupe_acteurs_user.user_id , app_user.prenom , app_user.nom  from groupe_acteurs , groupe_acteurs_user , app_user where groupe_acteurs.id = groupe_acteurs_user.groupe_acteurs_id and app_user.id= groupe_acteurs_user.user_id";

        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();


    }




    // /**
    //  * @return GroupeActeurs[] Returns an array of GroupeActeurs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GroupeActeurs
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
