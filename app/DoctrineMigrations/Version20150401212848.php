<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150401212848 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Client (id INT AUTO_INCREMENT NOT NULL, person_id INT DEFAULT NULL, registerDate DATETIME NOT NULL, UNIQUE INDEX UNIQ_C0E80163217BBB47 (person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Person (id INT AUTO_INCREMENT NOT NULL, firstName VARCHAR(255) NOT NULL, lastName VARCHAR(255) NOT NULL, birthday DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, iso VARCHAR(15) NOT NULL, code INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Address (id INT AUTO_INCREMENT NOT NULL, state_id INT DEFAULT NULL, country_id INT DEFAULT NULL, person_id INT DEFAULT NULL, streetNumber INT NOT NULL, street VARCHAR(255) NOT NULL, zipCode VARCHAR(15) NOT NULL, INDEX IDX_C2F3561D5D83CC1 (state_id), INDEX IDX_C2F3561DF92F3E70 (country_id), INDEX IDX_C2F3561D217BBB47 (person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE State (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(15) NOT NULL, INDEX IDX_6252FDFFF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Client ADD CONSTRAINT FK_C0E80163217BBB47 FOREIGN KEY (person_id) REFERENCES Person (id)');
        $this->addSql('ALTER TABLE Address ADD CONSTRAINT FK_C2F3561D5D83CC1 FOREIGN KEY (state_id) REFERENCES State (id)');
        $this->addSql('ALTER TABLE Address ADD CONSTRAINT FK_C2F3561DF92F3E70 FOREIGN KEY (country_id) REFERENCES Country (id)');
        $this->addSql('ALTER TABLE Address ADD CONSTRAINT FK_C2F3561D217BBB47 FOREIGN KEY (person_id) REFERENCES Person (id)');
        $this->addSql('ALTER TABLE State ADD CONSTRAINT FK_6252FDFFF92F3E70 FOREIGN KEY (country_id) REFERENCES Country (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Client DROP FOREIGN KEY FK_C0E80163217BBB47');
        $this->addSql('ALTER TABLE Address DROP FOREIGN KEY FK_C2F3561D217BBB47');
        $this->addSql('ALTER TABLE Address DROP FOREIGN KEY FK_C2F3561DF92F3E70');
        $this->addSql('ALTER TABLE State DROP FOREIGN KEY FK_6252FDFFF92F3E70');
        $this->addSql('ALTER TABLE Address DROP FOREIGN KEY FK_C2F3561D5D83CC1');
        $this->addSql('DROP TABLE Client');
        $this->addSql('DROP TABLE Person');
        $this->addSql('DROP TABLE Country');
        $this->addSql('DROP TABLE Address');
        $this->addSql('DROP TABLE State');
    }
}
