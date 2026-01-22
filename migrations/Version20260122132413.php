<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260122132413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil DROP CONSTRAINT fk_e6d6b297fb88e14f');
        $this->addSql('DROP INDEX uniq_e6d6b297fb88e14f');
        $this->addSql('ALTER TABLE profil DROP utilisateur_id');
        $this->addSql('ALTER TABLE utilisateur ADD profil_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3275ED078 FOREIGN KEY (profil_id) REFERENCES profil (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3275ED078 ON utilisateur (profil_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profil ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profil ADD CONSTRAINT fk_e6d6b297fb88e14f FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_e6d6b297fb88e14f ON profil (utilisateur_id)');
        $this->addSql('ALTER TABLE utilisateur DROP CONSTRAINT FK_1D1C63B3275ED078');
        $this->addSql('DROP INDEX IDX_1D1C63B3275ED078');
        $this->addSql('ALTER TABLE utilisateur DROP profil_id');
    }
}
