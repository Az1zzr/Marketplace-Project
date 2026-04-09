<?php

namespace App\Repository;

use App\Entity\Role;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

class RoleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Role::class);
    }

    public function save(Role $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Role $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByNomRole(string $nomRole): ?Role
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.nomRole = :nomRole')
            ->setParameter('nomRole', $nomRole)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function createPublicRegistrationQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder('r')
            ->andWhere('LOWER(r.nomRole) != :adminRole')
            ->setParameter('adminRole', 'admin')
            ->orderBy('r.nomRole', 'ASC');
    }
}
