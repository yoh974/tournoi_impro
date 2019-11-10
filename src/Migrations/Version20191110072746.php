<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191110072746 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE games ADD id_equipe_1_id INT NOT NULL, ADD id_equipe_2_id INT NOT NULL, DROP equipe_1_id, DROP equipe_2_id');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT FK_FF232B31E18800F3 FOREIGN KEY (id_equipe_1_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT FK_FF232B31F33DAF1D FOREIGN KEY (id_equipe_2_id) REFERENCES equipe (id)');
        $this->addSql('CREATE INDEX IDX_FF232B31E18800F3 ON games (id_equipe_1_id)');
        $this->addSql('CREATE INDEX IDX_FF232B31F33DAF1D ON games (id_equipe_2_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE games DROP FOREIGN KEY FK_FF232B31E18800F3');
        $this->addSql('ALTER TABLE games DROP FOREIGN KEY FK_FF232B31F33DAF1D');
        $this->addSql('DROP INDEX IDX_FF232B31E18800F3 ON games');
        $this->addSql('DROP INDEX IDX_FF232B31F33DAF1D ON games');
        $this->addSql('ALTER TABLE games ADD equipe_1_id INT NOT NULL, ADD equipe_2_id INT NOT NULL, DROP id_equipe_1_id, DROP id_equipe_2_id');
    }
}
