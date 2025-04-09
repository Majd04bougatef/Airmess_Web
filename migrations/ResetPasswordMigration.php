<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class ResetPasswordMigration extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Adds reset password fields to users table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE users ADD resetToken VARCHAR(255) DEFAULT NULL, ADD resetTokenExpires DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE users DROP resetToken, DROP resetTokenExpires');
    }
} 