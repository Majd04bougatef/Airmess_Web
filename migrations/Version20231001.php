<?php

declare(strict_types=1);

namespace Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20231001 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // This is the SQL to add the publication_date column
        $this->addSql('ALTER TABLE socialmedia ADD publication_date DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // This is the SQL to remove the publication_date column
        $this->addSql('ALTER TABLE socialmedia DROP publication_date');
    }
}
