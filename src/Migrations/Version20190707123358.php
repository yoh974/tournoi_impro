<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190707123358 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE match_resultat');
        $this->addSql('ALTER TABLE `match` ADD id_equipe_1_id INT DEFAULT NULL, ADD id_equipe_2_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC505E18800F3 FOREIGN KEY (id_equipe_1_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE `match` ADD CONSTRAINT FK_7A5BC505F33DAF1D FOREIGN KEY (id_equipe_2_id) REFERENCES equipe (id)');
        $this->addSql('CREATE INDEX IDX_7A5BC505E18800F3 ON `match` (id_equipe_1_id)');
        $this->addSql('CREATE INDEX IDX_7A5BC505F33DAF1D ON `match` (id_equipe_2_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE match_resultat (id INT AUTO_INCREMENT NOT NULL, id_match_id INT NOT NULL, id_equipe_1_id INT DEFAULT NULL, id_equipe_2_id INT DEFAULT NULL, INDEX IDX_3AA18774E18800F3 (id_equipe_1_id), INDEX IDX_3AA18774F33DAF1D (id_equipe_2_id), UNIQUE INDEX UNIQ_3AA187747A654043 (id_match_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE match_resultat ADD CONSTRAINT FK_3AA187747A654043 FOREIGN KEY (id_match_id) REFERENCES `match` (id)');
        $this->addSql('ALTER TABLE match_resultat ADD CONSTRAINT FK_3AA18774E18800F3 FOREIGN KEY (id_equipe_1_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE match_resultat ADD CONSTRAINT FK_3AA18774F33DAF1D FOREIGN KEY (id_equipe_2_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE `match` DROP FOREIGN KEY FK_7A5BC505E18800F3');
        $this->addSql('ALTER TABLE `match` DROP FOREIGN KEY FK_7A5BC505F33DAF1D');
        $this->addSql('DROP INDEX IDX_7A5BC505E18800F3 ON `match`');
        $this->addSql('DROP INDEX IDX_7A5BC505F33DAF1D ON `match`');
        $this->addSql('ALTER TABLE `match` DROP id_equipe_1_id, DROP id_equipe_2_id');
    }
}
