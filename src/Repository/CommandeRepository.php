<?php

namespace App\Repository;

use App\Entity\Commande;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

class CommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commande::class);
    }

    public function save(Commande $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Commande $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByClient(string $client): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.client LIKE :client')
            ->setParameter('client', '%' . $client . '%')
            ->orderBy('c.dateCommande', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByStatut(string $statut): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.statut = :statut')
            ->setParameter('statut', $statut)
            ->orderBy('c.dateCommande', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByDateRange(\DateTimeInterface $start, \DateTimeInterface $end): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.dateCommande >= :start')
            ->andWhere('c.dateCommande <= :end')
            ->setParameter('start', $start)
            ->setParameter('end', $end)
            ->orderBy('c.dateCommande', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findBySearchAndSort(string $search, string $sort, string $order, ?string $statut): array
    {
        $qb = $this->createQueryBuilder('c');

        if (!empty($search)) {
            $qb->andWhere('c.client LIKE :search OR c.numeroCommande LIKE :search OR c.adresseLivraison LIKE :search OR c.gouvernorat LIKE :search OR c.telephoneLivraison LIKE :search OR c.commentaireLivraison LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        if (!empty($statut)) {
            $qb->andWhere('c.statut = :statut')
               ->setParameter('statut', $statut);
        }

        $qb->orderBy('c.' . $sort, strtoupper($order));

        return $qb->getQuery()->getResult();
    }

    public function findDraftCartForUser(User $user): ?Commande
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.clientUser', 'clientUser')
            ->addSelect('clientUser')
            ->andWhere('c.clientUser = :user')
            ->andWhere('c.statut = :cartStatus')
            ->setParameter('user', $user)
            ->setParameter('cartStatus', Commande::STATUS_CART)
            ->orderBy('c.idCommande', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findBySearchAndSortForUser(User $user, string $search, string $sort, string $order, ?string $statut): array
    {
        $qb = $this->createBaseQueryBuilder();

        if ($user->hasRoleCode(User::ROLE_CODE_CLIENT)) {
            $qb->andWhere('c.clientUser = :user')
                ->setParameter('user', $user);
        } elseif ($user->hasRoleCode(User::ROLE_CODE_FOURNISSEUR)) {
            $qb->andWhere('fournisseur = :user')
                ->setParameter('user', $user);
        }

        $qb->andWhere('c.statut != :cartStatus')
            ->setParameter('cartStatus', Commande::STATUS_CART);

        if (!empty($search)) {
            $qb->andWhere('c.client LIKE :search OR c.numeroCommande LIKE :search OR c.adresseLivraison LIKE :search OR c.gouvernorat LIKE :search OR c.telephoneLivraison LIKE :search OR c.commentaireLivraison LIKE :search OR produit.nomProduit LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        if (!empty($statut)) {
            $qb->andWhere('c.statut = :statut')
               ->setParameter('statut', $statut);
        }

        $sortField = 'client' === $sort ? 'c.client' : 'c.' . $sort;
        $qb->orderBy($sortField, strtoupper($order))
            ->addOrderBy('c.dateCommande', 'DESC');

        return $qb->getQuery()->getResult();
    }

    public function findOneVisibleForUser(int $id, User $user): ?Commande
    {
        $qb = $this->createBaseQueryBuilder()
            ->andWhere('c.idCommande = :id')
            ->setParameter('id', $id);

        if ($user->hasRoleCode(User::ROLE_CODE_CLIENT)) {
            $qb->andWhere('c.clientUser = :user')
                ->setParameter('user', $user);
        } elseif ($user->hasRoleCode(User::ROLE_CODE_FOURNISSEUR)) {
            $qb->andWhere('fournisseur = :user')
                ->setParameter('user', $user);
        }

        return $qb->getQuery()->getOneOrNullResult();
    }

    private function createBaseQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder('c')
            ->distinct()
            ->leftJoin('c.clientUser', 'clientUser')
            ->addSelect('clientUser')
            ->leftJoin('c.lignesCommande', 'ligneCommande')
            ->addSelect('ligneCommande')
            ->leftJoin('ligneCommande.produit', 'produit')
            ->addSelect('produit')
            ->leftJoin('produit.fournisseur', 'fournisseur')
            ->addSelect('fournisseur')
            ->leftJoin('c.livraison', 'livraison')
            ->addSelect('livraison');
    }
}
