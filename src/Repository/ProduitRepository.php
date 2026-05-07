<?php

namespace App\Repository;

use App\Entity\Produit;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
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
            ->leftJoin('p.categorie', 'c')
            ->addSelect('c')
            ->andWhere('p.prix >= :min')
            ->andWhere('p.prix <= :max')
            ->setParameter('min', $min)
            ->setParameter('max', $max)
            ->orderBy('p.prix', 'ASC')
             ->setMaxResults(50)
            ->getQuery()
            ->getResult();
    }

    public function findByName(string $nom): array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.categorie', 'c')
            ->addSelect('c')
            ->andWhere('p.nomProduit LIKE :nom OR c.nom LIKE :nom')
            ->setParameter('nom', '%' . $nom . '%')
            ->orderBy('p.nomProduit', 'ASC')
            ->setMaxResults(50)
            ->getQuery()
            ->getResult();
    }

    public function findBySearchAndSort(
        string $search,
        string $sort,
        string $order,
        ?int $categorieId = null,
        ?User $viewer = null
    ): array {
        return $this->createSearchQueryBuilder($search, $sort, $order, $categorieId, $viewer)
            ->getQuery()
            ->getResult();
    }

    public function createSearchQueryBuilder(
        string $search,
        string $sort,
        string $order,
        ?int $categorieId = null,
        ?User $viewer = null
    ): QueryBuilder {
        $qb = $this->createQueryBuilder('p')
            ->leftJoin('p.categorie', 'c')
            ->addSelect('c')
            ->leftJoin('p.fournisseur', 'fournisseur')
            ->addSelect('fournisseur');

        if (!empty($search)) {
            $qb->andWhere(
                'p.nomProduit LIKE :search 
                OR p.adresse LIKE :search 
                OR c.nom LIKE :search 
                OR CONCAT(fournisseur.prenom, :space, fournisseur.nom) LIKE :search'
            )
                ->setParameter('search', '%' . $search . '%')
                ->setParameter('space', ' ');
        }

        if ($categorieId !== null) {
            $qb->andWhere('c.id = :categorieId')
                ->setParameter('categorieId', $categorieId);
        }

        if ($viewer instanceof User && $viewer->hasRoleCode(User::ROLE_CODE_FOURNISSEUR)) {
            $qb->andWhere('p.fournisseur = :viewer')
                ->setParameter('viewer', $viewer);
        }

        return $qb->orderBy('p.' . $sort, strtoupper($order));
    }
}