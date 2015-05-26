<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150518220356 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Vehicule (id INT AUTO_INCREMENT NOT NULL, parking_id INT DEFAULT NULL, color VARCHAR(255) NOT NULL, brand VARCHAR(255) NOT NULL, immatriculation VARCHAR(255) NOT NULL, kind VARCHAR(255) NOT NULL, INDEX IDX_D0599D4BF17B2DD (parking_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Space (id INT AUTO_INCREMENT NOT NULL, space_type_id INT DEFAULT NULL, available TINYINT(1) NOT NULL, INDEX IDX_E8B3EE3E455857DB (space_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Parking (id INT AUTO_INCREMENT NOT NULL, space_id INT DEFAULT NULL, available TINYINT(1) NOT NULL, no VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7D8A6BE623575340 (space_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Unit (id INT AUTO_INCREMENT NOT NULL, space_id INT DEFAULT NULL, available TINYINT(1) NOT NULL, no VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_7C89A36D23575340 (space_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE SpaceType (id INT AUTO_INCREMENT NOT NULL, site_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, suggestedPrice NUMERIC(10, 0) NOT NULL, INDEX IDX_FE5D1D1EF6BD1646 (site_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Vehicule ADD CONSTRAINT FK_D0599D4BF17B2DD FOREIGN KEY (parking_id) REFERENCES Parking (id)');
        $this->addSql('ALTER TABLE Space ADD CONSTRAINT FK_E8B3EE3E455857DB FOREIGN KEY (space_type_id) REFERENCES SpaceType (id)');
        $this->addSql('ALTER TABLE Parking ADD CONSTRAINT FK_7D8A6BE623575340 FOREIGN KEY (space_id) REFERENCES Space (id)');
        $this->addSql('ALTER TABLE Unit ADD CONSTRAINT FK_7C89A36D23575340 FOREIGN KEY (space_id) REFERENCES Space (id)');
        $this->addSql('ALTER TABLE SpaceType ADD CONSTRAINT FK_FE5D1D1EF6BD1646 FOREIGN KEY (site_id) REFERENCES Site (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Parking DROP FOREIGN KEY FK_7D8A6BE623575340');
        $this->addSql('ALTER TABLE Unit DROP FOREIGN KEY FK_7C89A36D23575340');
        $this->addSql('ALTER TABLE Vehicule DROP FOREIGN KEY FK_D0599D4BF17B2DD');
        $this->addSql('ALTER TABLE Space DROP FOREIGN KEY FK_E8B3EE3E455857DB');
        $this->addSql('DROP TABLE Vehicule');
        $this->addSql('DROP TABLE Space');
        $this->addSql('DROP TABLE Parking');
        $this->addSql('DROP TABLE Unit');
        $this->addSql('DROP TABLE SpaceType');
    }
}
