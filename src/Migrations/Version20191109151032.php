<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191109151032 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, nom_equipe VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_match (id INT AUTO_INCREMENT NOT NULL, id_game_id INT NOT NULL, image VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_6D1E41AC3A127075 (id_game_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lieu_match (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, complement_adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(5) NOT NULL, ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, equipe_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, nom_de_scene VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, email VARCHAR(255) NOT NULL, INDEX IDX_FCEC9EF6D861B89 (equipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistique (id INT AUTO_INCREMENT NOT NULL, id_personne_id INT NOT NULL, id_match_id INT NOT NULL, name VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, INDEX IDX_73A038ADBA091CE5 (id_personne_id), INDEX IDX_73A038AD7A654043 (id_match_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournoi (id INT AUTO_INCREMENT NOT NULL, saison VARCHAR(255) NOT NULL, nbre_match INT DEFAULT NULL, date_debut_tournoi DATE NOT NULL, date_fin_tournoi DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fos_user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', UNIQUE INDEX UNIQ_957A647992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_957A6479A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_957A6479C05FB297 (confirmation_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image_match ADD CONSTRAINT FK_6D1E41AC3A127075 FOREIGN KEY (id_game_id) REFERENCES games (id)');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EF6D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE statistique ADD CONSTRAINT FK_73A038ADBA091CE5 FOREIGN KEY (id_personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE statistique ADD CONSTRAINT FK_73A038AD7A654043 FOREIGN KEY (id_match_id) REFERENCES games (id)');
        $this->addSql('ALTER TABLE games ADD lieux_match_id INT NOT NULL');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT FK_FF232B31538DF7DD FOREIGN KEY (id_tournoi_id) REFERENCES tournoi (id)');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT FK_FF232B31E18800F3 FOREIGN KEY (id_equipe_1_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT FK_FF232B31F33DAF1D FOREIGN KEY (id_equipe_2_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT FK_FF232B31C6986AA8 FOREIGN KEY (lieux_match_id) REFERENCES lieu_match (id)');
        $this->addSql('CREATE INDEX IDX_FF232B31C6986AA8 ON games (lieux_match_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE games DROP FOREIGN KEY FK_FF232B31E18800F3');
        $this->addSql('ALTER TABLE games DROP FOREIGN KEY FK_FF232B31F33DAF1D');
        $this->addSql('ALTER TABLE personne DROP FOREIGN KEY FK_FCEC9EF6D861B89');
        $this->addSql('ALTER TABLE games DROP FOREIGN KEY FK_FF232B31C6986AA8');
        $this->addSql('ALTER TABLE statistique DROP FOREIGN KEY FK_73A038ADBA091CE5');
        $this->addSql('ALTER TABLE games DROP FOREIGN KEY FK_FF232B31538DF7DD');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE image_match');
        $this->addSql('DROP TABLE lieu_match');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE statistique');
        $this->addSql('DROP TABLE tournoi');
        $this->addSql('DROP TABLE fos_user');
        $this->addSql('DROP INDEX IDX_FF232B31C6986AA8 ON games');
        $this->addSql('ALTER TABLE games DROP lieux_match_id');
    }
}
