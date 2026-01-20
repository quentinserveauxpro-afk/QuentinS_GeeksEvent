<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260120142044 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX uniq_1d1c63b326e94372');
        $this->addSql('ALTER TABLE utilisateur ADD roles JSON NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur DROP mdp');
        $this->addSql('ALTER TABLE utilisateur ALTER nom TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE utilisateur ALTER email TYPE VARCHAR(180)');
        $this->addSql('ALTER TABLE utilisateur ALTER nom_de_scene TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE utilisateur ALTER pseudo TYPE VARCHAR(50)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON utilisateur (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL');
        $this->addSql('ALTER TABLE utilisateur ADD mdp VARCHAR(12) NOT NULL');
        $this->addSql('ALTER TABLE utilisateur DROP roles');
        $this->addSql('ALTER TABLE utilisateur DROP password');
        $this->addSql('ALTER TABLE utilisateur ALTER email TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE utilisateur ALTER nom TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE utilisateur ALTER nom_de_scene TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE utilisateur ALTER pseudo TYPE VARCHAR(255)');
        $this->addSql('CREATE UNIQUE INDEX uniq_1d1c63b326e94372 ON utilisateur (siret)');
    }
}
