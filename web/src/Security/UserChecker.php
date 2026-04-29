<?php

namespace App\Security;

use App\Entity\User;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAccountStatusException;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Métier 1 : Vérifie si l'utilisateur est actif avant chaque connexion.
 * Si isActive = false → exception → connexion refusée.
 */
class UserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user): void
    {
        if (!$user instanceof User) {
            return;
        }

        if (!$user->isActive()) {
            throw new CustomUserMessageAccountStatusException(
                'Votre compte a été bloqué. Contactez l\'administrateur.'
            );
        }
    }

    public function checkPostAuth(UserInterface $user): void
    {
        // Rien à vérifier après l'auth
    }
}
