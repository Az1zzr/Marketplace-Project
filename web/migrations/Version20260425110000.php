<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260425110000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add private client and supplier conversations';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql("CREATE TABLE conversation (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, fournisseur_id INT NOT NULL, produit_id INT DEFAULT NULL, commande_id INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', last_message_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_8D93D64919EB6921 (client_id), INDEX IDX_8D93D649E0D8B6D8 (fournisseur_id), INDEX IDX_8D93D649F347EFB (produit_id), INDEX IDX_8D93D64982EA2E54 (commande_id), UNIQUE INDEX uniq_conversation_client_fournisseur (client_id, fournisseur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB");
        $this->addSql("CREATE TABLE conversation_message (id INT AUTO_INCREMENT NOT NULL, conversation_id INT NOT NULL, sender_id INT NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', read_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_D67D31A19C0C757 (conversation_id), INDEX IDX_D67D31AF624B39D (sender_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB");
        $this->addSql('ALTER TABLE conversation ADD CONSTRAINT FK_8D93D64919EB6921 FOREIGN KEY (client_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conversation ADD CONSTRAINT FK_8D93D649E0D8B6D8 FOREIGN KEY (fournisseur_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conversation ADD CONSTRAINT FK_8D93D649F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE conversation ADD CONSTRAINT FK_8D93D64982EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (idCommande) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE conversation_message ADD CONSTRAINT FK_D67D31A19C0C757 FOREIGN KEY (conversation_id) REFERENCES conversation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE conversation_message ADD CONSTRAINT FK_D67D31AF624B39D FOREIGN KEY (sender_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE conversation_message DROP FOREIGN KEY FK_D67D31A19C0C757');
        $this->addSql('ALTER TABLE conversation_message DROP FOREIGN KEY FK_D67D31AF624B39D');
        $this->addSql('ALTER TABLE conversation DROP FOREIGN KEY FK_8D93D64919EB6921');
        $this->addSql('ALTER TABLE conversation DROP FOREIGN KEY FK_8D93D649E0D8B6D8');
        $this->addSql('ALTER TABLE conversation DROP FOREIGN KEY FK_8D93D649F347EFB');
        $this->addSql('ALTER TABLE conversation DROP FOREIGN KEY FK_8D93D64982EA2E54');
        $this->addSql('DROP TABLE conversation_message');
        $this->addSql('DROP TABLE conversation');
    }
}
