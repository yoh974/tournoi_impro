<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190707122743 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE match_resultat (id INT AUTO_INCREMENT NOT NULL, id_match_id INT NOT NULL, id_equipe_1_id INT DEFAULT NULL, id_equipe_2_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_3AA187747A654043 (id_match_id), INDEX IDX_3AA18774E18800F3 (id_equipe_1_id), INDEX IDX_3AA18774F33DAF1D (id_equipe_2_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE match_resultat ADD CONSTRAINT FK_3AA187747A654043 FOREIGN KEY (id_match_id) REFERENCES `match` (id)');
        $this->addSql('ALTER TABLE match_resultat ADD CONSTRAINT FK_3AA18774E18800F3 FOREIGN KEY (id_equipe_1_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE match_resultat ADD CONSTRAINT FK_3AA18774F33DAF1D FOREIGN KEY (id_equipe_2_id) REFERENCES equipe (id)');
        $this->addSql('DROP TABLE match_equipe');
        $this->addSql('ALTER TABLE `match` DROP nb_point_equipe_1, DROP nb_point_equipe_2');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE match_equipe (match_id INT NOT NULL, equipe_id INT NOT NULL, INDEX IDX_852643142ABEACD6 (match_id), INDEX IDX_852643146D861B89 (equipe_id), PRIMARY KEY(match_id, equipe_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE match_equipe ADD CONSTRAINT FK_852643142ABEACD6 FOREIGN KEY (match_id) REFERENCES `match` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE match_equipe ADD CONSTRAINT FK_852643146D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE match_resultat');
        $this->addSql('ALTER TABLE `match` ADD nb_point_equipe_1 INT DEFAULT NULL, ADD nb_point_equipe_2 INT DEFAULT NULL');
    }
}
