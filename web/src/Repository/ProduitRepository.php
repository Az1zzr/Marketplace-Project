<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    public function save(Produit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Produit $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByPrixRange(float $min, float $max): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.prix >= :min')
            ->andWhere('p.prix <= :max')
            ->setParameter('min', $min)
            ->setParameter('max', $max)
            ->orderBy('p.prix', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findByName(string $nom): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.nomProduit LIKE :nom')
            ->setParameter('nom', '%' . $nom . '%')
            ->orderBy('p.nomProduit', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findBySearchAndSort(string $search, string $sort, string $order): array
    {
        $qb = $this->createQueryBuilder('p');

        if (!empty($search)) {
            $qb->andWhere('p.nomProduit LIKE :search OR p.adresse LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        $qb->orderBy('p.' . $sort, strtoupper($order));

        return $qb->getQuery()->getResult();
    }
}
