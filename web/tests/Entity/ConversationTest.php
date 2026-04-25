<?php

namespace App\Tests\Entity;

use App\Entity\Conversation;
use App\Entity\ConversationMessage;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class ConversationTest extends TestCase
{
    public function testGetOtherParticipantReturnsTheExpectedUser(): void
    {
        $client = (new User())
            ->setPrenom('Amine')
            ->setNom('Client');
        $this->setEntityId($client, 1);

        $supplier = (new User())
            ->setPrenom('Sara')
            ->setNom('Supplier');
        $this->setEntityId($supplier, 2);

        $conversation = (new Conversation())
            ->setClient($client)
            ->setFournisseur($supplier);

        self::assertSame($supplier, $conversation->getOtherParticipant($client));
        self::assertSame($client, $conversation->getOtherParticipant($supplier));
        self::assertTrue($conversation->isParticipant($client));
        self::assertTrue($conversation->isParticipant($supplier));
    }

    public function testAddMessageSetsConversationAndRefreshesLastMessageTimestamp(): void
    {
        $conversation = new Conversation();
        $originalLastMessageAt = $conversation->getLastMessageAt();

        $message = (new ConversationMessage())
            ->setContent('Hello supplier');

        $conversation->addMessage($message);

        self::assertSame($conversation, $message->getConversation());
        self::assertTrue($conversation->getMessages()->contains($message));
        self::assertSame($message->getCreatedAt(), $conversation->getLastMessageAt());
        self::assertNotSame($originalLastMessageAt, $conversation->getLastMessageAt());
    }

    private function setEntityId(object $entity, int $id): void
    {
        $reflectionProperty = new \ReflectionProperty($entity, 'id');
        $reflectionProperty->setAccessible(true);
        $reflectionProperty->setValue($entity, $id);
    }
}
