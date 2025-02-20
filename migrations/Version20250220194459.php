<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250220194459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX uniq_eef7422e7e3c61f9');
        $this->addSql('CREATE INDEX IDX_EEF7422E7E3C61F9 ON chat_channel (owner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX IDX_EEF7422E7E3C61F9');
        $this->addSql('CREATE UNIQUE INDEX uniq_eef7422e7e3c61f9 ON chat_channel (owner_id)');
    }
}
