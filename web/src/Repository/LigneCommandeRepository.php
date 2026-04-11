<?php

namespace App\Repository;

use App\Entity\Commande;
use App\Entity\LigneCommande;
use App\Entity\Livraison;
use App\Entity\Produit;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class LigneCommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LigneCommande::class);
    }

    public function findEligibleFeedbackItemsForUser(User $user): array
    {
        return $this->createEligibilityQueryBuilder($user)
            ->orderBy('c.dateCommande', 'DESC')
            ->addOrderBy('l.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findEligibleFeedbackItemForUser(User $user, int $ligneCommandeId): ?LigneCommande
    {
        return $this->createEligibilityQueryBuilder($user)
            ->andWhere('l.id = :ligneCommandeId')
            ->setParameter('ligneCommandeId', $ligneCommandeId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findEligibleFeedbackItemForUserAndProduct(User $user, Produit $produit): ?LigneCommande
    {
        return $this->createEligibilityQueryBuilder($user)
            ->andWhere('l.produit = :produit')
            ->setParameter('produit', $produit)
            ->orderBy('c.dateCommande', 'DESC')
            ->addOrderBy('l.id', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult();
    }

    private function createEligibilityQueryBuilder(User $user)
    {
        return $this->createQueryBuilder('l')
            ->leftJoin('l.commande', 'c')
            ->addSelect('c')
            ->leftJoin('c.livraison', 'livraison')
            ->addSelect('livraison')
            ->leftJoin('l.produit', 'p')
            ->addSelect('p')
            ->leftJoin('l.feedback', 'f')
            ->addSelect('f')
            ->andWhere('c.clientUser = :user')
            ->andWhere('c.statut != :cartStatus')
            ->andWhere('livraison.statutLivraison = :deliveredStatus')
            ->andWhere('f.id IS NULL')
            ->setParameter('user', $user)
            ->setParameter('cartStatus', Commande::STATUS_CART)
            ->setParameter('deliveredStatus', Livraison::STATUS_DELIVERED);
    }
}
