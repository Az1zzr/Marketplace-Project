<?php

namespace App\Repository;

use App\Entity\Stock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class StockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stock::class);
    }

    public function save(Stock $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Stock $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByProduit(int $produitId): ?Stock
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.produit = :produitId')
            ->setParameter('produitId', $produitId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findLowStock(int $threshold = 10): array
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.quantite < :threshold')
            ->setParameter('threshold', $threshold)
            ->orderBy('s.quantite', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
