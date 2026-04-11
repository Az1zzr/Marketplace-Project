<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260411134500 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Move entrepreneur users to client role and remove obsolete entrepreneur roles';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $clientRoleId = $this->connection->fetchOne("SELECT id_role FROM role WHERE LOWER(nomRole) = 'client' LIMIT 1");
        $this->abortIf(false === $clientRoleId, 'Client role was not found.');

        $this->addSql('UPDATE `user` u INNER JOIN role r ON r.id_role = u.id_role SET u.id_role = ' . (int) $clientRoleId . " WHERE LOWER(r.nomRole) IN ('entrepreneur', 'entrepreneurs')");
        $this->addSql("DELETE FROM role WHERE LOWER(nomRole) IN ('entrepreneur', 'entrepreneurs')");
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $entrepreneurRoleId = $this->connection->fetchOne("SELECT id_role FROM role WHERE LOWER(nomRole) = 'entrepreneur' LIMIT 1");
        if (false === $entrepreneurRoleId) {
            $this->addSql("INSERT INTO role (nomRole) VALUES ('entrepreneur')");
            $entrepreneurRoleId = $this->connection->lastInsertId();
        }

        $clientRoleId = $this->connection->fetchOne("SELECT id_role FROM role WHERE LOWER(nomRole) = 'client' LIMIT 1");
        if (false !== $clientRoleId) {
            $this->addSql('UPDATE `user` SET id_role = ' . (int) $entrepreneurRoleId . ' WHERE id_role = ' . (int) $clientRoleId . ' AND email LIKE "%entrepreneur%"');
        }
    }
}
