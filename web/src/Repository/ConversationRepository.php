<?php

namespace App\Repository;

use App\Entity\Conversation;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

class ConversationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conversation::class);
    }

    public function save(Conversation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Conversation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Conversation[]
     */
    public function findByUserOrdered(User $user): array
    {
        return $this->createVisibleQueryBuilder($user)
            ->orderBy('c.lastMessageAt', 'DESC')
            ->addOrderBy('c.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findOneVisibleForUser(int $id, User $user): ?Conversation
    {
        return $this->createVisibleQueryBuilder($user)
            ->andWhere('c.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findDirectConversation(User $client, User $fournisseur): ?Conversation
    {
        return $this->createBaseQueryBuilder()
            ->andWhere('c.client = :client')
            ->andWhere('c.fournisseur = :fournisseur')
            ->setParameter('client', $client)
            ->setParameter('fournisseur', $fournisseur)
            ->getQuery()
            ->getOneOrNullResult();
    }

    private function createVisibleQueryBuilder(User $user): QueryBuilder
    {
        return $this->createBaseQueryBuilder()
            ->andWhere('c.client = :user OR c.fournisseur = :user')
            ->setParameter('user', $user);
    }

    private function createBaseQueryBuilder(): QueryBuilder
    {
        return $this->createQueryBuilder('c')
            ->leftJoin('c.client', 'client')
            ->addSelect('client')
            ->leftJoin('c.fournisseur', 'fournisseur')
            ->addSelect('fournisseur')
            ->leftJoin('c.produit', 'produit')
            ->addSelect('produit')
            ->leftJoin('c.commande', 'commande')
            ->addSelect('commande');
    }
}
