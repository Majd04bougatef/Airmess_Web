<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250424142019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC3D689F95
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCE96E089 FOREIGN KEY (id_U) REFERENCES users (id_U)
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
            ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC3D689F95 FOREIGN KEY (idEB) REFERENCES socialmedia (idEB)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE expense DROP FOREIGN KEY FK_2D3A8DA6E96E089
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX fk_2d3a8da6e96e089 ON expense
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_2D3A8DA6E96E089 ON expense (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE expense ADD CONSTRAINT FK_2D3A8DA6E96E089 FOREIGN KEY (id_U) REFERENCES users (id_U) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages CHANGE content content LONGTEXT NOT NULL COLLATE `utf8mb4_general_ci`
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages ADD CONSTRAINT FK_DB021E96F624B39D FOREIGN KEY (sender_id) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages ADD CONSTRAINT FK_DB021E96CD53EDB6 FOREIGN KEY (receiver_id) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages ADD CONSTRAINT FK_DB021E96BF396750 FOREIGN KEY (id) REFERENCES reservation_transport (id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_DB021E96F624B39D ON messages (sender_id)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_DB021E96CD53EDB6 ON messages (receiver_id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE offre DROP FOREIGN KEY fk_offre_users
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE offre ADD price_init DOUBLE PRECISION NOT NULL, ADD price_after DOUBLE PRECISION NOT NULL, ADD start_date DATETIME NOT NULL, ADD end_date DATETIME NOT NULL, ADD statusoff VARCHAR(255) DEFAULT 'En attente' NOT NULL, DROP priceInit, DROP priceAfter, DROP startDate, DROP endDate, CHANGE description description LONGTEXT DEFAULT NULL, CHANGE place place VARCHAR(255) DEFAULT NULL, CHANGE image_path image_path VARCHAR(255) DEFAULT NULL, CHANGE numberLimit number_limit INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE offre ADD CONSTRAINT FK_AF86866FE96E089 FOREIGN KEY (id_U) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY fk_reservation_offre
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD mode_paiement VARCHAR(50) DEFAULT NULL, DROP modePaiement, CHANGE idO idO INT NOT NULL, CHANGE dateRes date_res DATETIME NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT FK_42C849555FB5DB1F FOREIGN KEY (idO) REFERENCES offre (idO)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation_transport DROP FOREIGN KEY FK_7CEC40B14BB48750
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation_transport ADD CONSTRAINT FK_7CEC40B14BB48750 FOREIGN KEY (idS) REFERENCES station (idS)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reviewbonplan DROP FOREIGN KEY FK_D1BED233E96E089
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_D1BED233E96E089 ON reviewbonplan
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reviewbonplan DROP dateR, CHANGE id_U id_U INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE socialmedia CHANGE id_U id_U INT NOT NULL, CHANGE imagemedia imagemedia VARCHAR(500) DEFAULT ''
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE socialmedia ADD CONSTRAINT FK_78180273E96E089 FOREIGN KEY (id_U) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE station ADD statut VARCHAR(20) DEFAULT 'inactive' NOT NULL, CHANGE id_U id_U INT NOT NULL, CHANGE pays pays VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users ADD isOnline TINYINT(1) DEFAULT 0 NOT NULL, ADD lastActivity DATETIME DEFAULT NULL, CHANGE name name VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE roleUser roleUser VARCHAR(50) NOT NULL, CHANGE phoneNumber phoneNumber VARCHAR(20) NOT NULL, CHANGE statut statut VARCHAR(10) NOT NULL, CHANGE diamond diamond INT NOT NULL, CHANGE deleteFlag deleteFlag INT NOT NULL, CHANGE imagesU imagesU VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX email ON users
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
            ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCE96E089
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC3D689F95
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCE96E089
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
            ALTER TABLE expense DROP FOREIGN KEY FK_2D3A8DA6E96E089
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX idx_2d3a8da6e96e089 ON expense
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX FK_2D3A8DA6E96E089 ON expense (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE expense ADD CONSTRAINT FK_2D3A8DA6E96E089 FOREIGN KEY (id_U) REFERENCES users (id_U) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96F624B39D
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96CD53EDB6
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages DROP FOREIGN KEY FK_DB021E96BF396750
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_DB021E96F624B39D ON messages
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX IDX_DB021E96CD53EDB6 ON messages
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE messages CHANGE content content LONGTEXT NOT NULL
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
            ALTER TABLE offre DROP FOREIGN KEY FK_AF86866FE96E089
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE offre ADD priceInit DOUBLE PRECISION NOT NULL, ADD priceAfter DOUBLE PRECISION NOT NULL, ADD startDate DATETIME NOT NULL, ADD endDate DATETIME NOT NULL, DROP price_init, DROP price_after, DROP start_date, DROP end_date, DROP statusoff, CHANGE description description LONGTEXT NOT NULL, CHANGE place place VARCHAR(255) NOT NULL, CHANGE image_path image_path VARCHAR(255) NOT NULL, CHANGE number_limit numberLimit INT NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE offre ADD CONSTRAINT fk_offre_users FOREIGN KEY (id_U) REFERENCES users (id_U) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation DROP FOREIGN KEY FK_42C849555FB5DB1F
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD modePaiement VARCHAR(255) NOT NULL, DROP mode_paiement, CHANGE idO idO INT DEFAULT NULL, CHANGE date_res dateRes DATETIME NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation ADD CONSTRAINT fk_reservation_offre FOREIGN KEY (idO) REFERENCES offre (idO) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation_transport DROP FOREIGN KEY FK_7CEC40B14BB48750
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservation_transport ADD CONSTRAINT FK_7CEC40B14BB48750 FOREIGN KEY (idS) REFERENCES station (idS) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reviewbonplan ADD dateR DATETIME NOT NULL, CHANGE id_U id_U INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reviewbonplan ADD CONSTRAINT FK_D1BED233E96E089 FOREIGN KEY (id_U) REFERENCES users (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_D1BED233E96E089 ON reviewbonplan (id_U)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE socialmedia DROP FOREIGN KEY FK_78180273E96E089
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE socialmedia CHANGE imagemedia imagemedia VARCHAR(500) NOT NULL, CHANGE id_U id_U INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE station DROP statut, CHANGE pays pays VARCHAR(50) NOT NULL, CHANGE id_U id_U INT DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE users DROP isOnline, DROP lastActivity, CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL, CHANGE roleUser roleUser VARCHAR(255) DEFAULT NULL, CHANGE phoneNumber phoneNumber VARCHAR(20) DEFAULT NULL, CHANGE statut statut VARCHAR(10) DEFAULT NULL, CHANGE diamond diamond INT DEFAULT NULL, CHANGE deleteFlag deleteFlag INT DEFAULT NULL, CHANGE imagesU imagesU VARCHAR(255) DEFAULT NULL
        SQL);
        $this->addSql(<<<'SQL'
            DROP INDEX uniq_1483a5e9e7927c74 ON users
        SQL);
        $this->addSql(<<<'SQL'
            CREATE UNIQUE INDEX email ON users (email)
        SQL);
    }
}
