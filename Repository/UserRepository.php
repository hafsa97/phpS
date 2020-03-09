<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }
    public function getAllUsers()
    {
        $sql = "SELECT * FROM app_user ORDER BY id ASC";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        }
        catch (DBALException $e) {
            return [];
        }
    }

    public function getAllAdmins()
    {
        $sql = "SELECT * FROM app_user  where app_user.roles like '%ADMIN%'";

        try {
            return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
        }
        catch (DBALException $e) {
            return [];
        }
    }

    public function getRegularUsers()
    {
        return $this->createQueryBuilder('user')
            ->where('user.roles NOT LIKE :roles')
            ->setParameter('roles', '%_ADMIN%');
    }

}
