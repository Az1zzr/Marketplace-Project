<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260412190000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add password reset verification fields to users';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE user ADD reset_password_code_hash VARCHAR(255) DEFAULT NULL, ADD reset_password_expires_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE user DROP reset_password_code_hash, DROP reset_password_expires_at');
    }
}
