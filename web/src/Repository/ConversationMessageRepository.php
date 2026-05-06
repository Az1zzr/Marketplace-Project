<?php

namespace App\Repository;

use App\Entity\Conversation;
use App\Entity\ConversationMessage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ConversationMessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ConversationMessage::class);
    }

    public function save(ConversationMessage $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ConversationMessage $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return ConversationMessage[]
     */
    public function findByConversation(Conversation $conversation): array
    {
        return $this->createQueryBuilder('message')
            ->leftJoin('message.sender', 'sender')
            ->addSelect('sender')
            ->andWhere('message.conversation = :conversation')
            ->setParameter('conversation', $conversation)
            ->orderBy('message.createdAt', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
