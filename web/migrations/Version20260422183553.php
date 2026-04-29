<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260422183553 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX numeroCommande ON commande');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY `FK_COMMANDE_CLIENT_USER_ID`');
        $this->addSql('ALTER TABLE commande CHANGE client client VARCHAR(255) NOT NULL, CHANGE montantTotal montantTotal DOUBLE PRECISION NOT NULL, CHANGE statut statut VARCHAR(50) NOT NULL');
        $this->addSql('DROP INDEX idx_commande_client_user_id ON commande');
        $this->addSql('CREATE INDEX IDX_6EEAA67DF55397E8 ON commande (client_user_id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT `FK_COMMANDE_CLIENT_USER_ID` FOREIGN KEY (client_user_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('DROP INDEX idx_date ON feedback');
        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY `FK_D229445E31C31F1`');
        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY `FK_FEEDBACK_AUTEUR_ID`');
        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY `FK_FEEDBACK_LIGNE_COMMANDE_ID`');
        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY `FK_FEEDBACK_PRODUIT_ID`');
        $this->addSql('ALTER TABLE feedback CHANGE commentaire commentaire LONGTEXT NOT NULL, CHANGE date_statut date_statut DATETIME NOT NULL');
        $this->addSql('DROP INDEX idx_feedback_auteur_id ON feedback');
        $this->addSql('CREATE INDEX IDX_D229445860BB6FE6 ON feedback (auteur_id)');
        $this->addSql('DROP INDEX idx_feedback_produit_id ON feedback');
        $this->addSql('CREATE INDEX IDX_D2294458F347EFB ON feedback (produit_id)');
        $this->addSql('DROP INDEX uniq_feedback_ligne_commande_id ON feedback');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D2294458E10FEE63 ON feedback (ligne_commande_id)');
        $this->addSql('DROP INDEX uniq_d229445e31c31f1 ON feedback');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D22944588E54FB25 ON feedback (livraison_id)');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT `FK_D229445E31C31F1` FOREIGN KEY (livraison_id) REFERENCES livraison (idLivraison) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT `FK_FEEDBACK_AUTEUR_ID` FOREIGN KEY (auteur_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT `FK_FEEDBACK_LIGNE_COMMANDE_ID` FOREIGN KEY (ligne_commande_id) REFERENCES ligne_commande (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT `FK_FEEDBACK_PRODUIT_ID` FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY `FK_LIGNE_COMMANDE_COMMANDE_ID`');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY `FK_LIGNE_COMMANDE_PRODUIT_ID`');
        //his->addSql('DROP INDEX idx_ligne_commande_commande_id ON ligne_commande');
        //his->addSql('CREATE INDEX IDX_3170B74B82EA2E54 ON ligne_commande (commande_id)');
        $this->addSql('DROP INDEX idx_ligne_commande_produit_id ON ligne_commande');
        $this->addSql('CREATE INDEX IDX_3170B74BF347EFB ON ligne_commande (produit_id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT `FK_LIGNE_COMMANDE_COMMANDE_ID` FOREIGN KEY (commande_id) REFERENCES commande (idCommande) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT `FK_LIGNE_COMMANDE_PRODUIT_ID` FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison DROP INDEX idCommande, ADD UNIQUE INDEX UNIQ_A60C9F1F3D498C26 (idCommande)');
        $this->addSql('ALTER TABLE livraison CHANGE idCommande idCommande INT DEFAULT NULL, CHANGE statutLivraison statutLivraison VARCHAR(50) NOT NULL, CHANGE noteDelivery noteDelivery VARCHAR(255) DEFAULT NULL, CHANGE latitude latitude DOUBLE PRECISION NOT NULL, CHANGE longitude longitude DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY `FK_29A5EC27550A4EDC`');
        $this->addSql('DROP INDEX idx_29a5ec27550a4edc ON produit');
        $this->addSql('CREATE INDEX IDX_29A5EC27670C757F ON produit (fournisseur_id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT `FK_29A5EC27550A4EDC` FOREIGN KEY (fournisseur_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY `reponse_ibfk_1`');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY `FK_REPONSE_AUTEUR_ID`');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY `reponse_ibfk_1`');
        $this->addSql('ALTER TABLE reponse CHANGE contenu contenu LONGTEXT NOT NULL, CHANGE date_reponse date_reponse DATETIME NOT NULL, CHANGE feedback_id feedback_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7D249A887 FOREIGN KEY (feedback_id) REFERENCES feedback (id)');
        $this->addSql('DROP INDEX idx_feedback_id ON reponse');
        $this->addSql('CREATE INDEX IDX_5FB6DEC7D249A887 ON reponse (feedback_id)');
        $this->addSql('DROP INDEX idx_reponse_auteur_id ON reponse');
        $this->addSql('CREATE INDEX IDX_5FB6DEC760BB6FE6 ON reponse (auteur_id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT `FK_REPONSE_AUTEUR_ID` FOREIGN KEY (auteur_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (feedback_id) REFERENCES feedback (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role CHANGE id_role id_role INT AUTO_INCREMENT NOT NULL, CHANGE nomRole nomRole VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY `fk_role`');
        $this->addSql('ALTER TABLE user CHANGE id_role id_role INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
        $this->addSql('DROP INDEX fk_role ON user');
        $this->addSql('CREATE INDEX IDX_8D93D649DC499668 ON user (id_role)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT `fk_role` FOREIGN KEY (id_role) REFERENCES role (id_role)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DF55397E8');
        $this->addSql('ALTER TABLE commande CHANGE client client VARCHAR(100) NOT NULL, CHANGE montantTotal montantTotal NUMERIC(10, 2) NOT NULL, CHANGE statut statut VARCHAR(50) DEFAULT \'En attente\'');
        $this->addSql('CREATE UNIQUE INDEX numeroCommande ON commande (numeroCommande)');
        $this->addSql('DROP INDEX idx_6eeaa67df55397e8 ON commande');
        $this->addSql('CREATE INDEX IDX_COMMANDE_CLIENT_USER_ID ON commande (client_user_id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DF55397E8 FOREIGN KEY (client_user_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY FK_D229445860BB6FE6');
        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY FK_D2294458F347EFB');
        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY FK_D2294458E10FEE63');
        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY FK_D22944588E54FB25');
        $this->addSql('ALTER TABLE feedback CHANGE commentaire commentaire TEXT NOT NULL, CHANGE date_statut date_statut DATETIME DEFAULT CURRENT_TIMESTAMP');
        $this->addSql('CREATE INDEX idx_date ON feedback (date_statut)');
        $this->addSql('DROP INDEX idx_d229445860bb6fe6 ON feedback');
        $this->addSql('CREATE INDEX IDX_FEEDBACK_AUTEUR_ID ON feedback (auteur_id)');
        $this->addSql('DROP INDEX uniq_d2294458e10fee63 ON feedback');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FEEDBACK_LIGNE_COMMANDE_ID ON feedback (ligne_commande_id)');
        $this->addSql('DROP INDEX idx_d2294458f347efb ON feedback');
        $this->addSql('CREATE INDEX IDX_FEEDBACK_PRODUIT_ID ON feedback (produit_id)');
        $this->addSql('DROP INDEX uniq_d22944588e54fb25 ON feedback');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D229445E31C31F1 ON feedback (livraison_id)');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT FK_D229445860BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT FK_D2294458F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT FK_D2294458E10FEE63 FOREIGN KEY (ligne_commande_id) REFERENCES ligne_commande (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT FK_D22944588E54FB25 FOREIGN KEY (livraison_id) REFERENCES livraison (idLivraison) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74B82EA2E54');
        $this->addSql('ALTER TABLE ligne_commande DROP FOREIGN KEY FK_3170B74BF347EFB');
        $this->addSql('DROP INDEX idx_3170b74b82ea2e54 ON ligne_commande');
        $this->addSql('CREATE INDEX IDX_LIGNE_COMMANDE_COMMANDE_ID ON ligne_commande (commande_id)');
        $this->addSql('DROP INDEX idx_3170b74bf347efb ON ligne_commande');
        $this->addSql('CREATE INDEX IDX_LIGNE_COMMANDE_PRODUIT_ID ON ligne_commande (produit_id)');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74B82EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (idCommande) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ligne_commande ADD CONSTRAINT FK_3170B74BF347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE livraison DROP INDEX UNIQ_A60C9F1F3D498C26, ADD INDEX idCommande (idCommande)');
        $this->addSql('ALTER TABLE livraison CHANGE statutLivraison statutLivraison VARCHAR(50) DEFAULT \'En cours\', CHANGE noteDelivery noteDelivery TEXT DEFAULT NULL, CHANGE latitude latitude DOUBLE PRECISION DEFAULT NULL, CHANGE longitude longitude DOUBLE PRECISION DEFAULT NULL, CHANGE idCommande idCommande INT NOT NULL');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27670C757F');
        $this->addSql('DROP INDEX idx_29a5ec27670c757f ON produit');
        $this->addSql('CREATE INDEX IDX_29A5EC27550A4EDC ON produit (fournisseur_id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27670C757F FOREIGN KEY (fournisseur_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7D249A887');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7D249A887');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC760BB6FE6');
        $this->addSql('ALTER TABLE reponse CHANGE contenu contenu TEXT NOT NULL, CHANGE date_reponse date_reponse DATETIME DEFAULT CURRENT_TIMESTAMP, CHANGE feedback_id feedback_id INT NOT NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT `reponse_ibfk_1` FOREIGN KEY (feedback_id) REFERENCES feedback (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('DROP INDEX idx_5fb6dec760bb6fe6 ON reponse');
        $this->addSql('CREATE INDEX IDX_REPONSE_AUTEUR_ID ON reponse (auteur_id)');
        $this->addSql('DROP INDEX idx_5fb6dec7d249a887 ON reponse');
        $this->addSql('CREATE INDEX idx_feedback_id ON reponse (feedback_id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7D249A887 FOREIGN KEY (feedback_id) REFERENCES feedback (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC760BB6FE6 FOREIGN KEY (auteur_id) REFERENCES user (id) ON DELETE SET NULL');
        $this->addSql('ALTER TABLE role CHANGE id_role id_role INT NOT NULL, CHANGE nomRole nomRole VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649DC499668');
        $this->addSql('ALTER TABLE user CHANGE id_role id_role INT NOT NULL');
        $this->addSql('DROP INDEX idx_8d93d649dc499668 ON user');
        $this->addSql('CREATE INDEX fk_role ON user (id_role)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649DC499668 FOREIGN KEY (id_role) REFERENCES role (id_role)');
    }
}
