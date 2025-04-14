<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250408003440 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE bonplan DROP FOREIGN KEY FK_A2FB7270E96E089
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE expense DROP FOREIGN KEY FK_2D3A8DA6E96E089
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE offre DROP FOREIGN KEY fk_offre_users
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955E96E089
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY fk_reservation_offre
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reviewbonplan DROP FOREIGN KEY FK_D1BED233E96E089
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reviewbonplan DROP FOREIGN KEY FK_D1BED233D2BDD6EA
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE review_transport DROP FOREIGN KEY FK_F15ABA2F4BB48750
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE review_transport DROP FOREIGN KEY FK_F15ABA2FE96E089
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE bonplan
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE expense
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
            DROP TABLE reviewbonplan
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE review_transport
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire DROP FOREIGN KEY commentaire_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire DROP FOREIGN KEY commentaire_ibfk_2
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire DROP FOREIGN KEY commentaire_ibfk_1
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire DROP proposedDescription, DROP isApproved, CHANGE idC idC INT AUTO_INCREMENT NOT NULL, CHANGE description description LONGTEXT NOT NULL, CHANGE numberlike numberlike INT NOT NULL, CHANGE numberdislike numberdislike INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC3D689F95 FOREIGN KEY (idEB) REFERENCES socialmedia (idEB)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX ideb ON commentaire
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_67F068BC3D689F95 ON commentaire (idEB)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX id_u ON commentaire
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_67F068BCE96E089 ON commentaire (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire ADD CONSTRAINT commentaire_ibfk_2 FOREIGN KEY (id_U) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire ADD CONSTRAINT commentaire_ibfk_1 FOREIGN KEY (idEB) REFERENCES socialmedia (idEB) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation_transport DROP FOREIGN KEY FK_7CEC40B14BB48750
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation_transport ADD CONSTRAINT FK_7CEC40B14BB48750 FOREIGN KEY (idS) REFERENCES station (idS)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE socialmedia DROP FOREIGN KEY fk_socialmedia_users
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE socialmedia CHANGE id_U id_U INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE socialmedia ADD CONSTRAINT FK_78180273E96E089 FOREIGN KEY (id_U) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE station CHANGE id_U id_U INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users CHANGE roleUser roleUser VARCHAR(50) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messenger_messages CHANGE id id BIGINT AUTO_INCREMENT NOT NULL, CHANGE created_at created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', CHANGE available_at available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE bonplan (idP INT AUTO_INCREMENT NOT NULL, id_U INT DEFAULT NULL, nomplace VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, localisation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, typePlace VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, imageBP VARCHAR(500) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX IDX_A2FB7270E96E089 (id_U), PRIMARY KEY(idP)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE expense (idE INT AUTO_INCREMENT NOT NULL, id_U INT DEFAULT NULL, amount DOUBLE PRECISION NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, category VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, dateE DATE NOT NULL, nameEx VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, Imagedepense VARCHAR(500) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX FK_2D3A8DA6E96E089 (id_U), PRIMARY KEY(idE)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messages (id INT AUTO_INCREMENT NOT NULL, sender_id INT NOT NULL, receiver_id INT NOT NULL, content LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, dateM DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE offre (idO INT AUTO_INCREMENT NOT NULL, id_U INT DEFAULT NULL, priceInit DOUBLE PRECISION NOT NULL, priceAfter DOUBLE PRECISION NOT NULL, startDate DATETIME NOT NULL, endDate DATETIME NOT NULL, numberLimit INT NOT NULL, description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, place VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, image_path VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, aidesc LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, INDEX IDX_AF86866FE96E089 (id_U), PRIMARY KEY(idO)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE reservation (idR INT AUTO_INCREMENT NOT NULL, idO INT DEFAULT NULL, dateRes DATETIME NOT NULL, modePaiement VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, id_U INT DEFAULT NULL, INDEX IDX_42C849555FB5DB1F (idO), INDEX IDX_42C84955E96E089 (id_U), PRIMARY KEY(idR)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE reviewbonplan (idR INT AUTO_INCREMENT NOT NULL, id_U INT DEFAULT NULL, idP INT DEFAULT NULL, rating INT NOT NULL, commente LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, dateR DATETIME NOT NULL, INDEX IDX_D1BED233D2BDD6EA (idP), INDEX IDX_D1BED233E96E089 (id_U), PRIMARY KEY(idR)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE review_transport (id INT AUTO_INCREMENT NOT NULL, id_U INT DEFAULT NULL, idS INT DEFAULT NULL, rating INT NOT NULL, commentt LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, date_RT DATETIME NOT NULL, INDEX IDX_F15ABA2F4BB48750 (idS), INDEX IDX_F15ABA2FE96E089 (id_U), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = '' 
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE bonplan ADD CONSTRAINT FK_A2FB7270E96E089 FOREIGN KEY (id_U) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE expense ADD CONSTRAINT FK_2D3A8DA6E96E089 FOREIGN KEY (id_U) REFERENCES users (id_U) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE offre ADD CONSTRAINT fk_offre_users FOREIGN KEY (id_U) REFERENCES users (id_U) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT FK_42C84955E96E089 FOREIGN KEY (id_U) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT fk_reservation_offre FOREIGN KEY (idO) REFERENCES offre (idO) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reviewbonplan ADD CONSTRAINT FK_D1BED233E96E089 FOREIGN KEY (id_U) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reviewbonplan ADD CONSTRAINT FK_D1BED233D2BDD6EA FOREIGN KEY (idP) REFERENCES bonplan (idP) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE review_transport ADD CONSTRAINT FK_F15ABA2F4BB48750 FOREIGN KEY (idS) REFERENCES reservation_transport (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE review_transport ADD CONSTRAINT FK_F15ABA2FE96E089 FOREIGN KEY (id_U) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC3D689F95
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC3D689F95
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCE96E089
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire ADD proposedDescription MEDIUMTEXT DEFAULT NULL, ADD isApproved TINYINT(1) DEFAULT 0, CHANGE idC idC INT NOT NULL, CHANGE description description MEDIUMTEXT NOT NULL, CHANGE numberlike numberlike INT DEFAULT 0, CHANGE numberdislike numberdislike INT DEFAULT 0
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire ADD CONSTRAINT commentaire_ibfk_1 FOREIGN KEY (idEB) REFERENCES socialmedia (idEB) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_67f068bce96e089 ON commentaire
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX id_U ON commentaire (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_67f068bc3d689f95 ON commentaire
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX idEB ON commentaire (idEB)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC3D689F95 FOREIGN KEY (idEB) REFERENCES socialmedia (idEB)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCE96E089 FOREIGN KEY (id_U) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_75EA56E0FB7336F0 ON messenger_messages
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_75EA56E0E3BD61CE ON messenger_messages
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_75EA56E016BA31DB ON messenger_messages
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messenger_messages CHANGE id id BIGINT NOT NULL, CHANGE created_at created_at VARCHAR(255) NOT NULL, CHANGE available_at available_at VARCHAR(255) NOT NULL, CHANGE delivered_at delivered_at VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation_transport DROP FOREIGN KEY FK_7CEC40B14BB48750
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation_transport ADD CONSTRAINT FK_7CEC40B14BB48750 FOREIGN KEY (idS) REFERENCES station (idS) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE socialmedia DROP FOREIGN KEY FK_78180273E96E089
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE socialmedia CHANGE id_U id_U INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE socialmedia ADD CONSTRAINT fk_socialmedia_users FOREIGN KEY (id_U) REFERENCES users (id_U) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE station CHANGE id_U id_U INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX UNIQ_1483A5E9E7927C74 ON users
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users CHANGE roleUser roleUser VARCHAR(255) NOT NULL
        SQL);
    }
}
