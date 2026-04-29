<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260422194257 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

   public function up(Schema $schema): void
{
    // 1. 
    $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC760BB6FE6');
    $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7D249A887');
    $this->addSql('ALTER TABLE user DROP FOREIGN KEY fk_role');

    // 2. reponse indexes
    $this->addSql('DROP INDEX idx_feedback_id ON reponse');
    $this->addSql('DROP INDEX idx_reponse_auteur_id ON reponse');
    $this->addSql('CREATE INDEX IDX_5FB6DEC7D249A887 ON reponse (feedback_id)');
    $this->addSql('CREATE INDEX IDX_5FB6DEC760BB6FE6 ON reponse (auteur_id)');

    // 3. إFK reponse
    $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC760BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id) ON DELETE SET NULL');
    $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7D249A887 FOREIGN KEY (feedback_id) REFERENCES feedback (id)');

    // 4. role
    $this->addSql('ALTER TABLE role CHANGE id_role id_role INT AUTO_INCREMENT NOT NULL, CHANGE nomRole nomRole VARCHAR(50) NOT NULL');

    // 5. user modifications
    $this->addSql('ALTER TABLE user ADD created_at DATETIME NOT NULL');
    $this->addSql('ALTER TABLE user CHANGE id_role id_role INT DEFAULT NULL');

    // 6. indexes
    $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    $this->addSql('CREATE INDEX IDX_8D93D649DC499668 ON user (id_role)');

    // 7. 
    $this->addSql('ALTER TABLE user ADD CONSTRAINT fk_role FOREIGN KEY (id_role) REFERENCES role (id_role)');
}

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7D249A887');
$this->addSql('ALTER TABLE reponse DROP FOREIGN KEY IF EXISTS FK_5FB6DEC760BB6FE6');
        $this->addSql('CREATE INDEX IDX_REPONSE_AUTEUR_ID ON reponse (auteur_id)');
        $this->addSql('DROP INDEX idx_5fb6dec7d249a887 ON reponse');
        $this->addSql('CREATE INDEX idx_feedback_id ON reponse (feedback_id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7D249A887 FOREIGN KEY (feedback_id) REFERENCES feedback (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC760BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE role CHANGE id_role id_role INT NOT NULL, CHANGE nomRole nomRole VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649DC499668');
        $this->addSql('ALTER TABLE user DROP created_at, CHANGE id_role id_role INT NOT NULL');
        $this->addSql('DROP INDEX idx_8d93d649dc499668 ON user');
        $this->addSql('CREATE INDEX fk_role ON user (id_role)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649DC499668 FOREIGN KEY (id_role) REFERENCES role (id_role)');
    }
}
