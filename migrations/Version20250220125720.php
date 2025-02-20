<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250220125720 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_chat_channel (user_id INT NOT NULL, chat_channel_id INT NOT NULL, PRIMARY KEY(user_id, chat_channel_id))');
        $this->addSql('CREATE INDEX IDX_6E3B3E2CA76ED395 ON user_chat_channel (user_id)');
        $this->addSql('CREATE INDEX IDX_6E3B3E2CB504E40C ON user_chat_channel (chat_channel_id)');
        $this->addSql('ALTER TABLE user_chat_channel ADD CONSTRAINT FK_6E3B3E2CA76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_chat_channel ADD CONSTRAINT FK_6E3B3E2CB504E40C FOREIGN KEY (chat_channel_id) REFERENCES chat_channel (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE chat_message ADD author_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE chat_message ADD CONSTRAINT FK_FAB3FC16F675F31B FOREIGN KEY (author_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_FAB3FC16F675F31B ON chat_message (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE user_chat_channel DROP CONSTRAINT FK_6E3B3E2CA76ED395');
        $this->addSql('ALTER TABLE user_chat_channel DROP CONSTRAINT FK_6E3B3E2CB504E40C');
        $this->addSql('DROP TABLE user_chat_channel');
        $this->addSql('ALTER TABLE chat_message DROP CONSTRAINT FK_FAB3FC16F675F31B');
        $this->addSql('DROP INDEX IDX_FAB3FC16F675F31B');
        $this->addSql('ALTER TABLE chat_message DROP author_id');
    }
}
