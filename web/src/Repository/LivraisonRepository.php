<?php

namespace App\Repository;

use App\Entity\Livraison;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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
}
