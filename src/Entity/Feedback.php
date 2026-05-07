<?php

namespace App\Entity;

use App\Repository\FeedbackRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FeedbackRepository::class)]
#[ORM\Table(name: 'feedback')]
class Feedback
{
    public const MOOD_LOVE = 'love';
    public const MOOD_HAPPY = 'happy';
    public const MOOD_NEUTRAL = 'neutral';
    public const MOOD_SAD = 'sad';
    public const MOOD_ANGRY = 'angry';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120, nullable: true)]
    private ?string $titre = null;

    #[ORM\Column(type: 'text')]
    private ?string $commentaire = null;

    #[ORM\Column(length: 50)]
    private ?string $note = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $ambiance = null;

    #[ORM\Column(nullable: true)]
    private ?bool $recommande = null;

    #[ORM\Column(name: 'date_statut', type: 'datetime')]
    private ?\DateTimeInterface $dateStatut = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'auteur_id', referencedColumnName: 'id', nullable: true, onDelete: 'SET NULL')]
    private ?User $auteur = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name: 'produit_id', referencedColumnName: 'id', nullable: true, onDelete: 'SET NULL')]
    private ?Produit $produit = null;

    #[ORM\OneToOne(inversedBy: 'feedback')]
    #[ORM\JoinColumn(name: 'ligne_commande_id', referencedColumnName: 'id', nullable: true, unique: true, onDelete: 'SET NULL')]
    private ?LigneCommande $ligneCommande = null;

    #[ORM\OneToOne(inversedBy: 'feedback')]
    #[ORM\JoinColumn(name: 'livraison_id', referencedColumnName: 'idLivraison', nullable: true, unique: true, onDelete: 'SET NULL')]
    private ?Livraison $livraison = null;

    #[ORM\OneToMany(mappedBy: 'feedback', targetEntity: Reponse::class, cascade: ['persist', 'remove'])]
    private Collection $reponses;

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): static
    {
        $this->titre = null !== $titre ? trim($titre) : null;
        return $this;
    }

    public function setCommentaire(string $commentaire): static
    {
        $this->commentaire = $commentaire;
        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): static
    {
        $this->note = $note;
        return $this;
    }

    public function getAmbiance(): ?string
    {
        return $this->ambiance;
    }

    public function setAmbiance(?string $ambiance): static
    {
        $this->ambiance = $ambiance;
        return $this;
    }

    public function isRecommande(): ?bool
    {
        return $this->recommande;
    }

    public function setRecommande(?bool $recommande): static
    {
        $this->recommande = $recommande;
        return $this;
    }

    public function getDateStatut(): ?\DateTimeInterface
    {
        return $this->dateStatut;
    }

    public function setDateStatut(\DateTimeInterface $dateStatut): static
    {
        $this->dateStatut = $dateStatut;
        return $this;
    }

    public function getAuteur(): ?User
    {
        return $this->auteur;
    }

    public function setAuteur(?User $auteur): static
    {
        $this->auteur = $auteur;
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

    public function getLigneCommande(): ?LigneCommande
    {
        return $this->ligneCommande;
    }

    public function setLigneCommande(?LigneCommande $ligneCommande): static
    {
        $this->ligneCommande = $ligneCommande;
        if ($ligneCommande && null === $this->produit) {
            $this->produit = $ligneCommande->getProduit();
        }

        return $this;
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

    public function isDeliveryFeedback(): bool
    {
        return $this->livraison instanceof Livraison;
    }

    public function isProductFeedback(): bool
    {
        return $this->ligneCommande instanceof LigneCommande;
    }

    public function getDisplayTitle(): string
    {
        if (null !== $this->titre && '' !== trim($this->titre)) {
            return $this->titre;
        }

        if ($this->isDeliveryFeedback()) {
            return 'Delivery feedback';
        }

        return 'Product feedback';
    }

    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    public function addReponse(Reponse $reponse): static
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses->add($reponse);
            $reponse->setFeedback($this);
        }
        return $this;
    }

    public function removeReponse(Reponse $reponse): static
    {
        if ($this->reponses->removeElement($reponse)) {
            if ($reponse->getFeedback() === $this) {
                $reponse->setFeedback(null);
            }
        }
        return $this;
    }
}
