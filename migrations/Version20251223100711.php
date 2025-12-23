<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251223100711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE image_projet (id SERIAL NOT NULL, projet_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FF08C261C18272 ON image_projet (projet_id)');
        $this->addSql('CREATE TABLE language (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(50) NOT NULL, image VARCHAR(500) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE projet (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(4000) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE projet_language (projet_id INT NOT NULL, language_id INT NOT NULL, PRIMARY KEY(projet_id, language_id))');
        $this->addSql('CREATE INDEX IDX_F35B1A42C18272 ON projet_language (projet_id)');
        $this->addSql('CREATE INDEX IDX_F35B1A4282F1BAF4 ON projet_language (language_id)');
        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON "user" (email)');
        $this->addSql('ALTER TABLE image_projet ADD CONSTRAINT FK_FF08C261C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE projet_language ADD CONSTRAINT FK_F35B1A42C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE projet_language ADD CONSTRAINT FK_F35B1A4282F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE image_projet DROP CONSTRAINT FK_FF08C261C18272');
        $this->addSql('ALTER TABLE projet_language DROP CONSTRAINT FK_F35B1A42C18272');
        $this->addSql('ALTER TABLE projet_language DROP CONSTRAINT FK_F35B1A4282F1BAF4');
        $this->addSql('DROP TABLE image_projet');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE projet_language');
        $this->addSql('DROP TABLE "user"');
    }
}
