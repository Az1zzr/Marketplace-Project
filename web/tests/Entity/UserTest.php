<?php

namespace App\Tests\Entity;

use App\Entity\Role;
use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testClientRoleIsMappedToClientPermissions(): void
    {
        $role = (new Role())->setNomRole('customers');
        $user = (new User())
            ->setPrenom('  Amine  ')
            ->setNom('  Client  ')
            ->setEmail('  AMINE.CLIENT@GMAIL.COM  ')
            ->setTelephone('   ')
            ->setRole($role);

        self::assertSame('Amine Client', $user->getNomComplet());
        self::assertSame('amine.client@gmail.com', $user->getEmail());
        self::assertNull($user->getTelephone());
        self::assertSame(User::ROLE_CODE_CLIENT, $user->getRoleCode());
        self::assertSame('Client', $user->getRoleDisplayName());
        self::assertTrue($user->hasRoleCode(User::ROLE_CODE_CLIENT));
        self::assertContains('ROLE_CLIENT', $user->getRoles());
    }
}
