<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260412170000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Remove payment fields from orders';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE commande DROP modePaiement, DROP paymentProvider, DROP statutPaiement, DROP paiementReference, DROP datePaiement');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE commande ADD modePaiement VARCHAR(30) DEFAULT NULL, ADD paymentProvider VARCHAR(30) DEFAULT NULL, ADD statutPaiement VARCHAR(30) DEFAULT NULL, ADD paiementReference VARCHAR(100) DEFAULT NULL, ADD datePaiement DATETIME DEFAULT NULL');
    }
}
