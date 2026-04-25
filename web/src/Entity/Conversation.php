<?php

namespace App\Entity;

use App\Repository\ConversationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConversationRepository::class)]
#[ORM\Table(name: 'conversation')]
#[ORM\UniqueConstraint(name: 'uniq_conversation_client_fournisseur', columns: ['client_id', 'fournisseur_id'])]
class Conversation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'client_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?User $client = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'fournisseur_id', referencedColumnName: 'id', nullable: false, onDelete: 'CASCADE')]
    private ?User $fournisseur = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'produit_id', referencedColumnName: 'id', nullable: true, onDelete: 'SET NULL')]
    private ?Produit $produit = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'commande_id', referencedColumnName: 'idCommande', nullable: true, onDelete: 'SET NULL')]
    private ?Commande $commande = null;

    #[ORM\Column(name: 'created_at', type: 'datetime_immutable')]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(name: 'last_message_at', type: 'datetime_immutable')]
    private ?\DateTimeImmutable $lastMessageAt = null;

    /**
     * @var Collection<int, ConversationMessage>
     */
    #[ORM\OneToMany(mappedBy: 'conversation', targetEntity: ConversationMessage::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    #[ORM\OrderBy(['createdAt' => 'ASC'])]
    private Collection $messages;

    public function __construct()
    {
        $now = new \DateTimeImmutable();
        $this->createdAt = $now;
        $this->lastMessageAt = $now;
        $this->messages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getFournisseur(): ?User
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?User $fournisseur): static
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): static
    {
        $this->produit = $produit;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): static
    {
        $this->commande = $commande;

        return $this;
    }

    public function attachContext(?Produit $produit = null, ?Commande $commande = null): static
    {
        if (null === $this->produit && $produit instanceof Produit) {
            $this->produit = $produit;
        }

        if (null === $this->commande && $commande instanceof Commande) {
            $this->commande = $commande;
        }

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getLastMessageAt(): ?\DateTimeImmutable
    {
        return $this->lastMessageAt;
    }

    public function setLastMessageAt(\DateTimeImmutable $lastMessageAt): static
    {
        $this->lastMessageAt = $lastMessageAt;

        return $this;
    }

    public function touchLastMessageAt(?\DateTimeImmutable $lastMessageAt = null): static
    {
        $this->lastMessageAt = $lastMessageAt ?? new \DateTimeImmutable();

        return $this;
    }

    /**
     * @return Collection<int, ConversationMessage>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(ConversationMessage $message): static
    {
        if (!$this->messages->contains($message)) {
            $this->messages->add($message);
            $message->setConversation($this);
        }

        $this->touchLastMessageAt($message->getCreatedAt() ?? new \DateTimeImmutable());

        return $this;
    }

    public function removeMessage(ConversationMessage $message): static
    {
        if ($this->messages->removeElement($message) && $message->getConversation() === $this) {
            $message->setConversation(null);
        }

        return $this;
    }

    public function isParticipant(User $user): bool
    {
        return $this->client?->getId() === $user->getId() || $this->fournisseur?->getId() === $user->getId();
    }

    public function getOtherParticipant(User $user): ?User
    {
        if ($this->client?->getId() === $user->getId()) {
            return $this->fournisseur;
        }

        if ($this->fournisseur?->getId() === $user->getId()) {
            return $this->client;
        }

        return null;
    }
}
