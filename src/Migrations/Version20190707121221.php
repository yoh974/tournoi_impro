<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190707121221 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, nom_equipe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `match` (id INT AUTO_INCREMENT NOT NULL, id_tournoi_id INT DEFAULT NULL, date_match DATETIME NOT NULL, nb_point_equipe_1 INT DEFAULT NULL, nb_point_equipe_2 INT DEFAULT NULL, nb_spectateur INT DEFAULT NULL, INDEX IDX_7A5BC505538DF7DD (id_tournoi_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE match_equipe (match_id INT NOT NULL, equipe_id INT NOT NULL, INDEX IDX_852643142ABEACD6 (match_id), INDEX IDX_852643146D861B89 (equipe_id), PRIMARY KEY(match_id, equipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, id_equipe_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, nom_de_scene VARCHAR(255) DEFAULT NULL, INDEX IDX_FCEC9EFEDB3A7AE (id_equipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tournoi (id INT AUTO_INCREMENT NOT NULL, saison VARCHAR(255) NOT NULL, nbre_match INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC505538DF7DD FOREIGN KEY (id_tournoi_id) REFERENCES tournoi (id)');
        $this->addSql('ALTER TABLE match_equipe ADD CONSTRAINT FK_852643142ABEACD6 FOREIGN KEY (match_id) REFERENCES `match` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE match_equipe ADD CONSTRAINT FK_852643146D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE personne ADD CONSTRAINT FK_FCEC9EFEDB3A7AE FOREIGN KEY (id_equipe_id) REFERENCES equipe (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE match_equipe DROP FOREIGN KEY FK_852643146D861B89');
        $this->addSql('ALTER TABLE personne DROP FOREIGN KEY FK_FCEC9EFEDB3A7AE');
        $this->addSql('ALTER TABLE match_equipe DROP FOREIGN KEY FK_852643142ABEACD6');
        $this->addSql('ALTER TABLE `match` DROP FOREIGN KEY FK_7A5BC505538DF7DD');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE `match`');
        $this->addSql('DROP TABLE match_equipe');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE tournoi');
    }
}
