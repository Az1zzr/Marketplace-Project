<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260411173000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Attach products to fournisseurs so suppliers can receive relevant orders and deliveries';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE produit ADD fournisseur_id INT DEFAULT NULL');
        $this->addSql("UPDATE produit SET fournisseur_id = (SELECT u.id FROM `user` u INNER JOIN role r ON r.id_role = u.id_role WHERE LOWER(r.nomRole) IN ('fournisseur', 'fournisseurs', 'supplier', 'suppliers') ORDER BY u.id ASC LIMIT 1) WHERE fournisseur_id IS NULL");
        $this->addSql('CREATE INDEX IDX_29A5EC27550A4EDC ON produit (fournisseur_id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27550A4EDC FOREIGN KEY (fournisseur_id) REFERENCES `user` (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27550A4EDC');
        $this->addSql('DROP INDEX IDX_29A5EC27550A4EDC ON produit');
        $this->addSql('ALTER TABLE produit DROP fournisseur_id');
    }
}
