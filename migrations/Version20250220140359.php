<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250220140359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chat_message ADD channel_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE chat_message ADD CONSTRAINT FK_FAB3FC1672F5A1AA FOREIGN KEY (channel_id) REFERENCES chat_channel (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_FAB3FC1672F5A1AA ON chat_message (channel_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE chat_message DROP CONSTRAINT FK_FAB3FC1672F5A1AA');
        $this->addSql('DROP INDEX IDX_FAB3FC1672F5A1AA');
        $this->addSql('ALTER TABLE chat_message DROP channel_id');
    }
}
