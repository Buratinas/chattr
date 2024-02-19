<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240219123251 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create chat_message table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE chat_message (id UUID NOT NULL, sent_at TIMESTAMP(6) WITHOUT TIME ZONE NOT NULL, message VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN chat_message.id IS \'(DC2Type:uuid)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE chat_message');
    }
}
