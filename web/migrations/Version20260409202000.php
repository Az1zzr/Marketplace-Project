<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260409202000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add feedback and response authors with backfill to aziz@esprit.tn';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $ownerId = $this->connection->fetchOne("SELECT id FROM `user` WHERE email = 'aziz@esprit.tn' LIMIT 1");
        $this->abortIf(false === $ownerId, 'Backfill owner aziz@esprit.tn was not found.');

        $this->addSql('ALTER TABLE feedback ADD auteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse ADD auteur_id INT DEFAULT NULL');
        $this->addSql('UPDATE feedback SET auteur_id = ' . (int) $ownerId . ' WHERE auteur_id IS NULL');
        $this->addSql('UPDATE reponse SET auteur_id = ' . (int) $ownerId . ' WHERE auteur_id IS NULL');
        $this->addSql('CREATE INDEX IDX_FEEDBACK_AUTEUR_ID ON feedback (auteur_id)');
        $this->addSql('CREATE INDEX IDX_REPONSE_AUTEUR_ID ON reponse (auteur_id)');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT FK_FEEDBACK_AUTEUR_ID FOREIGN KEY (auteur_id) REFERENCES `user` (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_REPONSE_AUTEUR_ID FOREIGN KEY (auteur_id) REFERENCES `user` (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY FK_FEEDBACK_AUTEUR_ID');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_REPONSE_AUTEUR_ID');
        $this->addSql('DROP INDEX IDX_FEEDBACK_AUTEUR_ID ON feedback');
        $this->addSql('DROP INDEX IDX_REPONSE_AUTEUR_ID ON reponse');
        $this->addSql('ALTER TABLE feedback DROP auteur_id');
        $this->addSql('ALTER TABLE reponse DROP auteur_id');
    }
}
