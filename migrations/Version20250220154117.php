<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250220154117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chat_channel ADD owner_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE chat_channel ADD CONSTRAINT FK_EEF7422E7E3C61F9 FOREIGN KEY (owner_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EEF7422E7E3C61F9 ON chat_channel (owner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE chat_channel DROP CONSTRAINT FK_EEF7422E7E3C61F9');
        $this->addSql('DROP INDEX UNIQ_EEF7422E7E3C61F9');
        $this->addSql('ALTER TABLE chat_channel DROP owner_id');
    }
}
