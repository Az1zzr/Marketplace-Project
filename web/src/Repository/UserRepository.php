<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function save(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByEmail(string $email): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.email = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findByRole(int $roleId): array
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.role = :roleId')
            ->setParameter('roleId', $roleId)
            ->orderBy('u.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }

<<<<<<< HEAD
    public function findMarketplaceSuppliers(?User $excludeUser = null, string $search = ''): array
    {
        $qb = $this->createQueryBuilder('u')
            ->distinct()
            ->leftJoin('u.role', 'role')
            ->addSelect('role')
            ->innerJoin('u.produits', 'produit')
            ->orderBy('u.prenom', 'ASC')
            ->addOrderBy('u.nom', 'ASC');

        if ($excludeUser instanceof User) {
            $qb->andWhere('u.id != :excludeUserId')
                ->setParameter('excludeUserId', $excludeUser->getId());
        }

        $search = trim($search);
        if ('' !== $search) {
            $qb->andWhere('u.prenom LIKE :search OR u.nom LIKE :search OR u.email LIKE :search')
                ->setParameter('search', '%' . $search . '%');
        }

        return $qb->getQuery()->getResult();
    }
}
=======
    public function countActiveUsers(): int
    {
        return (int) $this->createQueryBuilder('u')
            ->select('COUNT(u.id)')
            ->andWhere('u.active = :active')
            ->setParameter('active', true)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countBlockedUsers(): int
    {
        return (int) $this->createQueryBuilder('u')
            ->select('COUNT(u.id)')
            ->andWhere('u.active = :active')
            ->setParameter('active', false)
            ->getQuery()
            ->getSingleScalarResult();
    }

    public function countUsersByMonth(): array
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT
                DATE_FORMAT(created_at, '%b %Y') AS label,
                MONTH(created_at)                AS month_num,
                YEAR(created_at)                 AS year_num,
                COUNT(id)                        AS total
            FROM user
            GROUP BY year_num, month_num, label
            ORDER BY year_num ASC, month_num ASC
        ";

        $results = $conn->executeQuery($sql)->fetchAllAssociative();

        return array_map(fn($row) => [
            'label' => $row['label'],
            'total' => (int) $row['total'],
        ], $results);
    }
}
>>>>>>> maram/access-control
