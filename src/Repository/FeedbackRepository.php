<?php

namespace App\Repository;

use App\Entity\Feedback;
use App\Entity\Produit;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class FeedbackRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Feedback::class);
    }

    public function save(Feedback $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Feedback $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByNote(string $note): array
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.note = :note')
            ->setParameter('note', $note)
            ->orderBy('f.dateStatut', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findBySearchAndSort(string $search, string $sort, string $order, ?User $viewer = null): array
    {
        $qb = $this->createQueryBuilder('f')
            ->distinct()
            ->leftJoin('f.auteur', 'a')
            ->addSelect('a')
            ->leftJoin('f.produit', 'p')
            ->addSelect('p')
            ->leftJoin('p.fournisseur', 'fournisseur')
            ->addSelect('fournisseur')
            ->leftJoin('f.livraison', 'livraison')
            ->addSelect('livraison')
            ->leftJoin('livraison.commande', 'deliveryCommande')
            ->addSelect('deliveryCommande')
            ->leftJoin('deliveryCommande.lignesCommande', 'deliveryLigneCommande')
            ->addSelect('deliveryLigneCommande')
            ->leftJoin('deliveryLigneCommande.produit', 'deliveryProduit')
            ->addSelect('deliveryProduit')
            ->leftJoin('deliveryProduit.fournisseur', 'deliveryFournisseur')
            ->addSelect('deliveryFournisseur')
            ->leftJoin('f.ligneCommande', 'l')
            ->addSelect('l');

        if ($viewer instanceof User && $viewer->hasRoleCode(User::ROLE_CODE_FOURNISSEUR)) {
            $qb->andWhere('p.fournisseur = :viewer OR deliveryFournisseur = :viewer')
                ->setParameter('viewer', $viewer);
        }

        if (!empty($search)) {
            $qb->andWhere('f.commentaire LIKE :search OR f.titre LIKE :search OR p.nomProduit LIKE :search OR livraison.livreur LIKE :search OR deliveryCommande.numeroCommande LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        $qb->orderBy('f.' . $sort, strtoupper($order));

        return $qb->getQuery()->getResult();
    }

    public function findByProduit(Produit $produit): array
    {
        return $this->createQueryBuilder('f')
            ->leftJoin('f.auteur', 'a')
            ->addSelect('a')
            ->andWhere('f.produit = :produit')
            ->setParameter('produit', $produit)
            ->orderBy('f.dateStatut', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
