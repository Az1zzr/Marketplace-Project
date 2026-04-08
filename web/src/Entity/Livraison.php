<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
#[ORM\Table(name: 'livraison')]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'idLivraison')]
    private ?int $idLivraison = null;

    #[ORM\OneToOne(inversedBy: 'livraison')]
    #[ORM\JoinColumn(name: 'idCommande', referencedColumnName: 'idCommande')]
    private ?Commande $commande = null;

    #[ORM\Column(name: 'numeroBL', length: 50)]
    private ?string $numeroBL = null;

    #[ORM\Column(name: 'dateLivraison', type: 'date')]
    private ?\DateTimeInterface $dateLivraison = null;

    #[ORM\Column(length: 100)]
    private ?string $livreur = null;

    #[ORM\Column(name: 'statutLivraison', length: 50)]
    private ?string $statutLivraison = null;

    #[ORM\Column(name: 'noteDelivery', length: 255, nullable: true)]
    private ?string $noteDelivery = null;

    #[ORM\Column(type: 'float')]
    private ?float $latitude = 0.0;

    #[ORM\Column(type: 'float')]
    private ?float $longitude = 0.0;

    public function getIdLivraison(): ?int
    {
        return $this->idLivraison;
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

    public function getNumeroBL(): ?string
    {
        return $this->numeroBL;
    }

    public function setNumeroBL(string $numeroBL): static
    {
        $this->numeroBL = $numeroBL;
        return $this;
    }

    public function getDateLivraison(): ?\DateTimeInterface
    {
        return $this->dateLivraison;
    }

    public function setDateLivraison(\DateTimeInterface $dateLivraison): static
    {
        $this->dateLivraison = $dateLivraison;
        return $this;
    }

    public function getLivreur(): ?string
    {
        return $this->livreur;
    }

    public function setLivreur(string $livreur): static
    {
        $this->livreur = $livreur;
        return $this;
    }

    public function getStatutLivraison(): ?string
    {
        return $this->statutLivraison;
    }

    public function setStatutLivraison(string $statutLivraison): static
    {
        $this->statutLivraison = $statutLivraison;
        return $this;
    }

    public function getNoteDelivery(): ?string
    {
        return $this->noteDelivery;
    }

    public function setNoteDelivery(?string $noteDelivery): static
    {
        $this->noteDelivery = $noteDelivery;
        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): static
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): static
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function hasLocation(): bool
    {
        return $this->latitude != 0 && $this->longitude != 0;
    }
}
