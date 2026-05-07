<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260411123000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Link orders to users, add order lines, and connect feedback to purchased products';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE commande ADD client_user_id INT DEFAULT NULL');
        $this->addSql('UPDATE commande c INNER JOIN `user` u ON LOWER(TRIM(c.client)) = LOWER(TRIM(CONCAT(u.prenom, " ", u.nom))) SET c.client_user_id = u.id WHERE c.client_user_id IS NULL');
        $this->addSql('CREATE INDEX IDX_COMMANDE_CLIENT_USER_ID ON commande (client_user_id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_COMMANDE_CLIENT_USER_ID FOREIGN KEY (client_user_id) REFERENCES `user` (id) ON DELETE SET NULL');

        $this->addSql('CREATE TABLE ligne_commande (id INT AUTO_INCREMENT NOT NULL, commande_id INT NOT NULL, produit_id INT NOT NULL, quantite INT NOT NULL, prix_unitaire DOUBLE PRECISION NOT NULL, INDEX IDX_LIGNE_COMMANDE_COMMANDE_ID (commande_id), INDEX IDX_LIGNE_COMMANDE_PRODUIT_ID (produit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_LIGNE_COMMANDE_COMMANDE_ID FOREIGN KEY (commande_id) REFERENCES commande (idCommande) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_LIGNE_COMMANDE_PRODUIT_ID FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');

        $this->addSql('ALTER TABLE feedback ADD produit_id INT DEFAULT NULL, ADD ligne_commande_id INT DEFAULT NULL');
        $this->addSql('CREATE INDEX IDX_FEEDBACK_PRODUIT_ID ON feedback (produit_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FEEDBACK_LIGNE_COMMANDE_ID ON feedback (ligne_commande_id)');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT FK_FEEDBACK_PRODUIT_ID FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT FK_FEEDBACK_LIGNE_COMMANDE_ID FOREIGN KEY (ligne_commande_id) REFERENCES ligne_commande (id) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY FK_FEEDBACK_PRODUIT_ID');
        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY FK_FEEDBACK_LIGNE_COMMANDE_ID');
        $this->addSql('DROP INDEX IDX_FEEDBACK_PRODUIT_ID ON feedback');
        $this->addSql('DROP INDEX UNIQ_FEEDBACK_LIGNE_COMMANDE_ID ON feedback');
        $this->addSql('ALTER TABLE feedback DROP produit_id, DROP ligne_commande_id');

        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_LIGNE_COMMANDE_COMMANDE_ID');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_LIGNE_COMMANDE_PRODUIT_ID');
        $this->addSql('DROP TABLE ligne_commande');

        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_COMMANDE_CLIENT_USER_ID');
        $this->addSql('DROP INDEX IDX_COMMANDE_CLIENT_USER_ID ON commande');
        $this->addSql('ALTER TABLE commande DROP client_user_id');
    }
}
