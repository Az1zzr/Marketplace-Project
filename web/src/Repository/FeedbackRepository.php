<?php

namespace App\Repository;

use App\Entity\Feedback;
use App\Entity\LigneCommande;
use App\Entity\Produit;
use App\Entity\Reponse;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Feedback>
 */
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

    /**
     * @return Feedback[]
     */
    public function findByNote(string $note): array
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.note = :note')
            ->setParameter('note', $note)
            ->orderBy('f.dateStatut', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @return Feedback[]
     */
    public function findBySearchAndSort(string $search, string $sort, string $order, ?User $viewer = null): array
    {
        $qb = $this->createQueryBuilder('f')
            ->leftJoin('f.auteur', 'a')
            ->addSelect('a')
            ->leftJoin('f.produit', 'p')
            ->addSelect('p')
            ->leftJoin('p.fournisseur', 'fournisseur')
            ->addSelect('fournisseur')
            ->leftJoin('f.livraison', 'livraison')
            ->addSelect('livraison')
            ->leftJoin('livraison.commande', 'deliveryCommande')
            ->addSelect('deliveryCommande');

        if ($viewer instanceof User && $viewer->hasRoleCode(User::ROLE_CODE_FOURNISSEUR)) {
            $qb->andWhere('p.fournisseur = :viewer OR EXISTS (
                    SELECT deliveryLine.id
                    FROM ' . LigneCommande::class . ' deliveryLine
                    JOIN deliveryLine.produit deliveryLineProduct
                    WHERE deliveryLine.commande = deliveryCommande
                    AND deliveryLineProduct.fournisseur = :viewer
                )')
                ->setParameter('viewer', $viewer);
        }

        if (!empty($search)) {
            $qb->andWhere('f.commentaire LIKE :search OR f.titre LIKE :search OR p.nomProduit LIKE :search OR livraison.livreur LIKE :search OR deliveryCommande.numeroCommande LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }

        $qb->orderBy('f.' . $sort, strtoupper($order));

        return $qb->getQuery()->getResult();
    }

    /**
     * @param Feedback[] $feedbacks
     * @return array<int, int>
     */
    public function countResponsesByFeedbacks(array $feedbacks): array
    {
        $feedbackIds = [];
        foreach ($feedbacks as $feedback) {
            if ($feedback->getId() !== null) {
                $feedbackIds[] = $feedback->getId();
            }
        }

        if ([] === $feedbackIds) {
            return [];
        }

        $counts = array_fill_keys($feedbackIds, 0);
        $rows = $this->getEntityManager()->createQueryBuilder()
            ->select('IDENTITY(r.feedback) AS feedbackId, COUNT(r.id) AS responseCount')
            ->from(Reponse::class, 'r')
            ->andWhere('IDENTITY(r.feedback) IN (:feedbackIds)')
            ->setParameter('feedbackIds', $feedbackIds)
            ->groupBy('r.feedback')
            ->getQuery()
            ->getArrayResult();

        foreach ($rows as $row) {
            $counts[(int) $row['feedbackId']] = (int) $row['responseCount'];
        }

        return $counts;
    }

    /**
     * @return Feedback[]
     */
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
