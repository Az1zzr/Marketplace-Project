<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: 'user')]
#[UniqueEntity(fields: ['email'], message: 'An account with this email already exists.')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    public const ROLE_CODE_ADMIN = 'admin';
    public const ROLE_CODE_CLIENT = 'client';
    public const ROLE_CODE_FOURNISSEUR = 'fournisseur';

    private const ROLE_ALIASES = [
        self::ROLE_CODE_ADMIN => ['admin', 'administrateur', 'administrator'],
        self::ROLE_CODE_CLIENT => ['client', 'clients', 'customer', 'customers', 'user', 'users', 'utilisateur', 'utilisateurs'],
        self::ROLE_CODE_FOURNISSEUR => ['fournisseur', 'fournisseurs', 'supplier', 'suppliers'],
    ];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: 'Please enter your last name.')]
    #[Assert\Length(max: 255, maxMessage: 'Your last name cannot be longer than {{ limit }} characters.')]
    private ?string $nom = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message: 'Please enter your first name.')]
    #[Assert\Length(max: 100, maxMessage: 'Your first name cannot be longer than {{ limit }} characters.')]
    private ?string $prenom = null;

    #[ORM\Column(length: 255, unique: true)]
    #[Assert\NotBlank(message: 'Please enter your email address.')]
    #[Assert\Email(message: 'Please enter a valid email address.')]
    #[Assert\Length(max: 255, maxMessage: 'Your email address cannot be longer than {{ limit }} characters.')]
    private ?string $email = null;

    #[ORM\Column(length: 20, nullable: true)]
    #[Assert\Length(max: 20, maxMessage: 'Your phone number cannot be longer than {{ limit }} characters.')]
    #[Assert\Regex(pattern: '/^$|^\+?[0-9\s().-]{8,20}$/', message: 'Please enter a valid phone number.')]
    private ?string $telephone = null;

    #[ORM\Column(name: 'motDePasse', length: 255)]
    private ?string $motDePasse = null;

    #[ORM\Column(name: 'date_naissance', type: 'date', nullable: true)]
    #[Assert\LessThanOrEqual('today', message: 'Birth date cannot be in the future.')]
    private ?\DateTimeInterface $dateNaissance = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    #[ORM\JoinColumn(name: 'id_role', referencedColumnName: 'id_role')]
    #[Assert\NotNull(message: 'Please select an account type.')]
    private ?Role $role = null;

    #[ORM\Column(name: 'photo_profil', length: 500, nullable: true)]
    private ?string $photoPath = null;

    #[ORM\Column(name: 'reset_password_code_hash', length: 255, nullable: true)]
    private ?string $resetPasswordCodeHash = null;

    #[ORM\Column(name: 'reset_password_expires_at', type: 'datetime', nullable: true)]
    private ?\DateTimeInterface $resetPasswordExpiresAt = null;

    #[ORM\OneToMany(mappedBy: 'fournisseur', targetEntity: Produit::class)]
    private Collection $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = trim($nom);
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = trim($prenom);
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = strtolower(trim($email));
        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): static
    {
        $telephone = null === $telephone ? null : trim($telephone);
        $this->telephone = '' === $telephone ? null : $telephone;
        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): static
    {
        $this->motDePasse = $motDePasse;
        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(?\DateTimeInterface $dateNaissance): static
    {
        $this->dateNaissance = $dateNaissance;
        return $this;
    }

    public function getRole(): ?Role
    {
        return $this->role;
    }

    public function setRole(?Role $role): static
    {
        $this->role = $role;
        return $this;
    }

    public function getPhotoPath(): ?string
    {
        return $this->photoPath;
    }

    public function setPhotoPath(?string $photoPath): static
    {
        $this->photoPath = $photoPath;
        return $this;
    }

    public function getResetPasswordCodeHash(): ?string
    {
        return $this->resetPasswordCodeHash;
    }

    public function setResetPasswordCodeHash(?string $resetPasswordCodeHash): static
    {
        $this->resetPasswordCodeHash = $resetPasswordCodeHash;
        return $this;
    }

    public function getResetPasswordExpiresAt(): ?\DateTimeInterface
    {
        return $this->resetPasswordExpiresAt;
    }

    public function setResetPasswordExpiresAt(?\DateTimeInterface $resetPasswordExpiresAt): static
    {
        $this->resetPasswordExpiresAt = $resetPasswordExpiresAt;
        return $this;
    }

    public function getNomComplet(): string
    {
        return trim(($this->prenom ?? '') . ' ' . ($this->nom ?? ''));
    }

    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function getRoleCode(): ?string
    {
        $roleName = strtolower(trim((string) $this->role?->getNomRole()));
        if ('' === $roleName) {
            return null;
        }

        foreach (self::ROLE_ALIASES as $roleCode => $aliases) {
            if (in_array($roleName, $aliases, true)) {
                return $roleCode;
            }
        }

        return null;
    }

    public function getRoleDisplayName(): string
    {
        return match ($this->getRoleCode()) {
            self::ROLE_CODE_ADMIN => 'Admin',
            self::ROLE_CODE_CLIENT => 'Client',
            self::ROLE_CODE_FOURNISSEUR => 'Fournisseur',
            default => $this->role?->getNomRole() ?? 'User',
        };
    }

    public function hasRoleCode(string $roleCode): bool
    {
        return $this->getRoleCode() === $roleCode;
    }

    public function getRoles(): array
    {
        $roles = ['ROLE_USER'];

        switch ($this->getRoleCode()) {
            case self::ROLE_CODE_ADMIN:
                $roles[] = 'ROLE_ADMIN';
                break;

            case self::ROLE_CODE_CLIENT:
                $roles[] = 'ROLE_CLIENT';
                break;

            case self::ROLE_CODE_FOURNISSEUR:
                $roles[] = 'ROLE_FOURNISSEUR';
                break;
        }

        return array_unique($roles);
    }

    public function eraseCredentials(): void
    {
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getPassword(): ?string
    {
        return $this->motDePasse;
    }
}
