<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260418100000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add Vich upload timestamp to users and slug field to products';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE user ADD photo_updated_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD slug VARCHAR(255) DEFAULT NULL');

        $rows = $this->connection->fetchAllAssociative('SELECT id, nom_produit FROM produit ORDER BY id ASC');
        foreach ($rows as $row) {
            $id = (int) ($row['id'] ?? 0);
            $name = (string) ($row['nom_produit'] ?? '');
            $slug = $this->slugify($name);

            if ('' === $slug) {
                $slug = 'product';
            }

            $slug .= '-' . $id;

            $this->addSql('UPDATE produit SET slug = :slug WHERE id = :id', [
                'slug' => $slug,
                'id' => $id,
            ]);
        }

        $this->addSql('ALTER TABLE produit MODIFY slug VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D34A04ADF8E06786 ON produit (slug)');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('DROP INDEX UNIQ_D34A04ADF8E06786 ON produit');
        $this->addSql('ALTER TABLE produit DROP slug');
        $this->addSql('ALTER TABLE user DROP photo_updated_at');
    }

    private function slugify(string $value): string
    {
        $value = trim(mb_strtolower($value));
        $value = preg_replace('/[^a-z0-9]+/', '-', $value) ?? '';

        return trim($value, '-');
    }
}
