<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250406124749 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, sender_id INT NOT NULL, receiver_id INT NOT NULL, content LONGTEXT NOT NULL COLLATE `utf8mb4_general_ci`, dateM DATETIME NOT NULL, INDEX IDX_DB021E96F624B39D (sender_id), INDEX IDX_DB021E96CD53EDB6 (receiver_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE offre (idO INT AUTO_INCREMENT NOT NULL, price_init DOUBLE PRECISION NOT NULL, price_after DOUBLE PRECISION NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, number_limit INT NOT NULL, description LONGTEXT DEFAULT NULL, place VARCHAR(255) DEFAULT NULL, image_path VARCHAR(255) DEFAULT NULL, aidesc LONGTEXT NOT NULL, id_U INT DEFAULT NULL, INDEX IDX_AF86866FE96E089 (id_U), PRIMARY KEY(idO)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE reservation (idR INT AUTO_INCREMENT NOT NULL, date_res DATETIME NOT NULL, mode_paiement VARCHAR(255) NOT NULL, idO INT DEFAULT NULL, id_U INT DEFAULT NULL, INDEX IDX_42C849555FB5DB1F (idO), INDEX IDX_42C84955E96E089 (id_U), PRIMARY KEY(idR)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE reservation_transport (id INT AUTO_INCREMENT NOT NULL, dateRes DATETIME NOT NULL, dateFin DATETIME NOT NULL, prix DOUBLE PRECISION NOT NULL, statut VARCHAR(255) NOT NULL, reference VARCHAR(100) NOT NULL, nombreVelo INT NOT NULL, id_U INT DEFAULT NULL, idS INT DEFAULT NULL, INDEX IDX_7CEC40B1E96E089 (id_U), INDEX IDX_7CEC40B14BB48750 (idS), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE station (idS INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, capacite INT NOT NULL, nombreVelo INT NOT NULL, typeVelo VARCHAR(255) NOT NULL, prixHeure DOUBLE PRECISION NOT NULL, pays VARCHAR(50) NOT NULL, id_U INT NOT NULL, INDEX IDX_9F39F8B1E96E089 (id_U), PRIMARY KEY(idS)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE users (id_U INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roleUser VARCHAR(50) NOT NULL, dateNaiss DATE NOT NULL, phoneNumber VARCHAR(20) NOT NULL, statut VARCHAR(10) NOT NULL, diamond INT NOT NULL, deleteFlag INT NOT NULL, imagesU VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), PRIMARY KEY(id_U)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages ADD CONSTRAINT FK_DB021E96F624B39D FOREIGN KEY (sender_id) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages ADD CONSTRAINT FK_DB021E96CD53EDB6 FOREIGN KEY (receiver_id) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE offre ADD CONSTRAINT FK_AF86866FE96E089 FOREIGN KEY (id_U) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT FK_42C849555FB5DB1F FOREIGN KEY (idO) REFERENCES offre (idO)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT FK_42C84955E96E089 FOREIGN KEY (id_U) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation_transport ADD CONSTRAINT FK_7CEC40B1E96E089 FOREIGN KEY (id_U) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation_transport ADD CONSTRAINT FK_7CEC40B14BB48750 FOREIGN KEY (idS) REFERENCES station (idS)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE station ADD CONSTRAINT FK_9F39F8B1E96E089 FOREIGN KEY (id_U) REFERENCES users (id_U)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96F624B39D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96CD53EDB6
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FE96E089
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY FK_42C849555FB5DB1F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955E96E089
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation_transport DROP FOREIGN KEY FK_7CEC40B1E96E089
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation_transport DROP FOREIGN KEY FK_7CEC40B14BB48750
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE station DROP FOREIGN KEY FK_9F39F8B1E96E089
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messages
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE offre
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE reservation
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE reservation_transport
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE station
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE users
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
