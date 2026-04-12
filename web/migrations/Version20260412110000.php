<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260412110000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add checkout payment, governorate, delivery phone, and delivery comment fields to orders';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE commande ADD modePaiement VARCHAR(30) DEFAULT NULL, ADD gouvernorat VARCHAR(100) DEFAULT NULL, ADD telephoneLivraison VARCHAR(20) DEFAULT NULL, ADD commentaireLivraison VARCHAR(500) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE commande DROP modePaiement, DROP gouvernorat, DROP telephoneLivraison, DROP commentaireLivraison');
    }
}
