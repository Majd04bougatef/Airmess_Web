<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Add page_title column to page_views table
 */
final class Version20240711001000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add page_title column to page_views table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE page_views ADD page_title VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE page_views DROP page_title');
    }
} 