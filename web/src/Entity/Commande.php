<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
#[ORM\Table(name: 'commande')]
class Commande
{
    public const STATUS_CART = 'Panier';
    public const STATUS_PENDING = 'En attente';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'idCommande')]
    private ?int $idCommande = null;

    #[ORM\Column(name: 'numeroCommande', length: 50)]
    private ?string $numeroCommande = null;

    #[ORM\Column(length: 255)]
    private ?string $client = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'client_user_id', referencedColumnName: 'id', nullable: true, onDelete: 'SET NULL')]
    private ?User $clientUser = null;

    #[ORM\Column(name: 'dateCommande', type: 'date')]
    private ?\DateTimeInterface $dateCommande = null;

    #[ORM\Column(name: 'montantTotal', type: 'float')]
    private ?float $montantTotal = null;

    #[ORM\Column(name: 'adresseLivraison', length: 255)]
    private ?string $adresseLivraison = null;

    #[ORM\Column(length: 50)]
    private ?string $statut = null;

    #[ORM\OneToOne(mappedBy: 'commande', cascade: ['persist', 'remove'])]
    private ?Livraison $livraison = null;

    #[ORM\OneToMany(mappedBy: 'commande', targetEntity: LigneCommande::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $lignesCommande;

    public function __construct()
    {
        $this->lignesCommande = new ArrayCollection();
    }

    public function getIdCommande(): ?int
    {
        return $this->idCommande;
    }

    public function getNumeroCommande(): ?string
    {
        return $this->numeroCommande;
    }

    public function setNumeroCommande(string $numeroCommande): static
    {
        $this->numeroCommande = $numeroCommande;
        return $this;
    }

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(string $client): static
    {
        $this->client = trim($client);
        return $this;
    }

    public function getClientUser(): ?User
    {
        return $this->clientUser;
    }

    public function setClientUser(?User $clientUser): static
    {
        $this->clientUser = $clientUser;
        return $this;
    }

    public function getClientDisplayName(): string
    {
        if ($this->clientUser instanceof User && '' !== $this->clientUser->getNomComplet()) {
            return $this->clientUser->getNomComplet();
        }

        return $this->client ?? 'Unknown client';
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): static
    {
        $this->dateCommande = $dateCommande;
        return $this;
    }

    public function getMontantTotal(): ?float
    {
        return $this->montantTotal;
    }

    public function setMontantTotal(float $montantTotal): static
    {
        $this->montantTotal = $montantTotal;
        return $this;
    }

    public function getAdresseLivraison(): ?string
    {
        return $this->adresseLivraison;
    }

    public function setAdresseLivraison(string $adresseLivraison): static
    {
        $this->adresseLivraison = trim($adresseLivraison);
        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
    {
        $this->statut = $statut;
        return $this;
    }

    public function isCart(): bool
    {
        return self::STATUS_CART === $this->statut;
    }

    public function getLivraison(): ?Livraison
    {
        return $this->livraison;
    }

    public function setLivraison(?Livraison $livraison): static
    {
        $this->livraison = $livraison;
        return $this;
    }

    public function getLignesCommande(): Collection
    {
        return $this->lignesCommande;
    }

    public function addLigneCommande(LigneCommande $ligneCommande): static
    {
        if (!$this->lignesCommande->contains($ligneCommande)) {
            $this->lignesCommande->add($ligneCommande);
            $ligneCommande->setCommande($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): static
    {
        if ($this->lignesCommande->removeElement($ligneCommande)) {
            if ($ligneCommande->getCommande() === $this) {
                $ligneCommande->setCommande(null);
            }
        }

        return $this;
    }

    public function getTotalItems(): int
    {
        return array_reduce(
            $this->lignesCommande->toArray(),
            static fn (int $total, LigneCommande $ligneCommande): int => $total + $ligneCommande->getQuantite(),
            0
        );
    }

    public function recalculateMontantTotal(): static
    {
        $this->montantTotal = array_reduce(
            $this->lignesCommande->toArray(),
            static fn (float $total, LigneCommande $ligneCommande): float => $total + $ligneCommande->getSousTotal(),
            0.0
        );

        return $this;
    }
}
