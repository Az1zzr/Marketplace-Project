<?php

namespace App\Entity;

use App\Repository\UserRepository;
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

    public function getNomComplet(): string
    {
        return trim(($this->prenom ?? '') . ' ' . ($this->nom ?? ''));
    }

    public function getRoles(): array
    {
        $roles = ['ROLE_USER'];
        if ($this->role) {
            $roleName = strtolower(trim((string) $this->role->getNomRole()));
            if ('admin' === $roleName) {
                $roles[] = 'ROLE_ADMIN';
            } elseif (in_array($roleName, ['fournisseur', 'fournisseurs'], true)) {
                $roles[] = 'ROLE_FOURNISSEUR';
            } elseif (in_array($roleName, ['entrepreneur', 'entrepreneurs'], true)) {
                $roles[] = 'ROLE_ENTREPRENEUR';
            }
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
