<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Platforms\MySQLPlatform;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20260411190000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add professional feedback fields and support delivery-driver feedback';
    }

    public function up(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE feedback ADD titre VARCHAR(120) DEFAULT NULL, ADD ambiance VARCHAR(30) DEFAULT NULL, ADD recommande TINYINT(1) DEFAULT NULL, ADD livraison_id INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D229445E31C31F1 ON feedback (livraison_id)');
        $this->addSql('ALTER TABLE feedback ADD CONSTRAINT FK_D229445E31C31F1 FOREIGN KEY (livraison_id) REFERENCES livraison (idLivraison) ON DELETE SET NULL');
    }

    public function down(Schema $schema): void
    {
        $this->abortIf(!$this->connection->getDatabasePlatform() instanceof MySQLPlatform, 'Migration can only be executed safely on mysql.');

        $this->addSql('ALTER TABLE feedback DROP FOREIGN KEY FK_D229445E31C31F1');
        $this->addSql('DROP INDEX UNIQ_D229445E31C31F1 ON feedback');
        $this->addSql('ALTER TABLE feedback DROP titre, DROP ambiance, DROP recommande, DROP livraison_id');
    }
}
