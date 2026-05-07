<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260412113000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add Konnect payment tracking fields to orders';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE commande ADD statutPaiement VARCHAR(30) DEFAULT NULL, ADD paiementReference VARCHAR(100) DEFAULT NULL, ADD datePaiement DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE commande DROP statutPaiement, DROP paiementReference, DROP datePaiement');
    }
}
