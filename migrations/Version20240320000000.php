<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240320000000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Fix message table structure';
    }

    public function up(Schema $schema): void
    {
        // Drop the existing foreign key if it exists
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY IF EXISTS FK_DB021E96BF396750');
        
        // Add the new reservation_id column
        $this->addSql('ALTER TABLE messages ADD reservation_id INT DEFAULT NULL');
        
        // Add the new foreign key
        $this->addSql('ALTER TABLE messages ADD CONSTRAINT FK_DB021E96B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation_transport (id)');
        
        // Create index for the new foreign key
        $this->addSql('CREATE INDEX IDX_DB021E96B83297E7 ON messages (reservation_id)');
    }

    public function down(Schema $schema): void
    {
        // Remove the new foreign key
        $this->addSql('ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96B83297E7');
        
        // Drop the index
        $this->addSql('DROP INDEX IDX_DB021E96B83297E7 ON messages');
        
        // Remove the reservation_id column
        $this->addSql('ALTER TABLE messages DROP reservation_id');
    }
} 