<?php

namespace App\Repository;

use App\Entity\Livraison;
use App\Entity\Commande;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

class LivraisonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Livraison::class);
    }

    public function save(Livraison $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Livraison $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByCommande(int $commandeId): ?Livraison
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.commande = :commandeId')
            ->setParameter('commandeId', $commandeId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findByLivreur(string $livreur): array
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.livreur LIKE :livreur')
            ->setParameter('livreur', '%' . $livreur . '%')
            ->orderBy('l.dateLivraison', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByStatut(string $statut): array
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.statutLivraison = :statut')
            ->setParameter('statut', $statut)
            ->orderBy('l.dateLivraison', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByDateRange(\DateTimeInterface $start, \DateTimeInterface $end): array
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.dateLivraison >= :start')
            ->andWhere('l.dateLivraison <= :end')
            ->setParameter('start', $start)
            ->setParameter('end', $end)
            ->orderBy('l.dateLivraison', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findBySearchAndSort(string $search, string $sort, string $order, ?string $statut): array
    {
        $qb = $this->createQueryBuilder('l');

        if (!empty($search)) {
            $qb->andWhere('l.numeroBL LIKE :search OR l.livreur LIKE :search OR l.noteDelivery LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        if (!empty($statut)) {
            $qb->andWhere('l.statutLivraison = :statut')
               ->setParameter('statut', $statut);
        }

        $qb->orderBy('l.' . $sort, strtoupper($order));

        return $qb->getQuery()->getResult();
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
            $qb->andWhere('l.numeroBL LIKE :search OR l.livreur LIKE :search OR l.noteDelivery LIKE :search OR c.numeroCommande LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        if (!empty($statut)) {
            $qb->andWhere('l.statutLivraison = :statut')
               ->setParameter('statut', $statut);
        }

        $qb->orderBy('l.' . $sort, strtoupper($order))
            ->addOrderBy('l.dateLivraison', 'DESC');

        return $qb->getQuery()->getResult();
    }

    public function findOneVisibleForUser(int $id, User $user): ?Livraison
    {
        $qb = $this->createBaseQueryBuilder()
            ->andWhere('l.idLivraison = :id')
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
        return $this->createQueryBuilder('l')
            ->distinct()
            ->leftJoin('l.commande', 'c')
            ->addSelect('c')
            ->leftJoin('c.clientUser', 'clientUser')
            ->addSelect('clientUser')
            ->leftJoin('c.lignesCommande', 'ligneCommande')
            ->addSelect('ligneCommande')
            ->leftJoin('ligneCommande.produit', 'produit')
            ->addSelect('produit')
            ->leftJoin('produit.fournisseur', 'fournisseur')
            ->addSelect('fournisseur');
    }
}
