<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190911134213 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE games (id INT AUTO_INCREMENT NOT NULL, id_tournoi_id INT NOT NULL, id_equipe_1_id INT NOT NULL, id_equipe_2_id INT NOT NULL, date_match DATE NOT NULL, nb_spectateur INT DEFAULT NULL, nb_point_equipe_1 INT DEFAULT NULL, nb_point_equipe_2 INT DEFAULT NULL, INDEX IDX_FF232B31538DF7DD (id_tournoi_id), INDEX IDX_FF232B31E18800F3 (id_equipe_1_id), INDEX IDX_FF232B31F33DAF1D (id_equipe_2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT FK_FF232B31538DF7DD FOREIGN KEY (id_tournoi_id) REFERENCES tournoi (id)');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT FK_FF232B31E18800F3 FOREIGN KEY (id_equipe_1_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT FK_FF232B31F33DAF1D FOREIGN KEY (id_equipe_2_id) REFERENCES equipe (id)');
        $this->addSql('DROP TABLE `match`');
        $this->addSql('ALTER TABLE equipe ADD image VARCHAR(255) DEFAULT NULL, ADD updated_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE `match` (id INT AUTO_INCREMENT NOT NULL, id_tournoi_id INT DEFAULT NULL, id_equipe_1_id INT DEFAULT NULL, id_equipe_2_id INT DEFAULT NULL, date_match DATETIME NOT NULL, nb_spectateur INT DEFAULT NULL, nb_point_equipe_1 INT DEFAULT NULL, nb_point_equipe_2 INT DEFAULT NULL, INDEX IDX_7A5BC505E18800F3 (id_equipe_1_id), INDEX IDX_7A5BC505538DF7DD (id_tournoi_id), INDEX IDX_7A5BC505F33DAF1D (id_equipe_2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC505538DF7DD FOREIGN KEY (id_tournoi_id) REFERENCES tournoi (id)');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC505E18800F3 FOREIGN KEY (id_equipe_1_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC505F33DAF1D FOREIGN KEY (id_equipe_2_id) REFERENCES equipe (id)');
        $this->addSql('DROP TABLE games');
        $this->addSql('ALTER TABLE equipe DROP image, DROP updated_at');
    }
}
