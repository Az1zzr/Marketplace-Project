<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260411101500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Insert the client role when it does not exist yet';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $clientRoleId = $this->connection->fetchOne("SELECT id_role FROM role WHERE LOWER(nomRole) IN ('client', 'clients', 'customer', 'customers', 'user', 'users', 'utilisateur', 'utilisateurs') LIMIT 1");
        if (false === $clientRoleId) {
            $this->addSql("INSERT INTO role (nomRole) VALUES ('Client')");
        }
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql("DELETE r FROM role r LEFT JOIN `user` u ON u.id_role = r.id_role WHERE LOWER(r.nomRole) = 'client' AND u.id IS NULL");
    }
}
