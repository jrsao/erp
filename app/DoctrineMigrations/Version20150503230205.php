<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150503230205 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Site (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Client (id INT AUTO_INCREMENT NOT NULL, person_id INT DEFAULT NULL, registerDate DATETIME NOT NULL, UNIQUE INDEX UNIQ_C0E80163217BBB47 (person_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Person (id INT AUTO_INCREMENT NOT NULL, firstName VARCHAR(255) NOT NULL, lastName VARCHAR(255) NOT NULL, birthday DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE City (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, code INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Country (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, iso VARCHAR(15) DEFAULT NULL, code INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Address (id INT AUTO_INCREMENT NOT NULL, state_id INT DEFAULT NULL, city_id INT DEFAULT NULL, country_id INT DEFAULT NULL, person_id INT DEFAULT NULL, site_id INT DEFAULT NULL, streetNumber INT NOT NULL, street VARCHAR(255) NOT NULL, zipCode VARCHAR(15) DEFAULT NULL, INDEX IDX_C2F3561D5D83CC1 (state_id), INDEX IDX_C2F3561D8BAC62AF (city_id), INDEX IDX_C2F3561DF92F3E70 (country_id), INDEX IDX_C2F3561D217BBB47 (person_id), INDEX IDX_C2F3561DF6BD1646 (site_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE PhoneNumber (id INT AUTO_INCREMENT NOT NULL, person_id INT DEFAULT NULL, site_id INT DEFAULT NULL, contact VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(255) NOT NULL, INDEX IDX_6EC20C33217BBB47 (person_id), INDEX IDX_6EC20C33F6BD1646 (site_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE State (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, code VARCHAR(15) DEFAULT NULL, INDEX IDX_6252FDFFF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Client ADD CONSTRAINT FK_C0E80163217BBB47 FOREIGN KEY (person_id) REFERENCES Person (id)');
        $this->addSql('ALTER TABLE Address ADD CONSTRAINT FK_C2F3561D5D83CC1 FOREIGN KEY (state_id) REFERENCES State (id)');
        $this->addSql('ALTER TABLE Address ADD CONSTRAINT FK_C2F3561D8BAC62AF FOREIGN KEY (city_id) REFERENCES City (id)');
        $this->addSql('ALTER TABLE Address ADD CONSTRAINT FK_C2F3561DF92F3E70 FOREIGN KEY (country_id) REFERENCES Country (id)');
        $this->addSql('ALTER TABLE Address ADD CONSTRAINT FK_C2F3561D217BBB47 FOREIGN KEY (person_id) REFERENCES Person (id)');
        $this->addSql('ALTER TABLE Address ADD CONSTRAINT FK_C2F3561DF6BD1646 FOREIGN KEY (site_id) REFERENCES Site (id)');
        $this->addSql('ALTER TABLE PhoneNumber ADD CONSTRAINT FK_6EC20C33217BBB47 FOREIGN KEY (person_id) REFERENCES Person (id)');
        $this->addSql('ALTER TABLE PhoneNumber ADD CONSTRAINT FK_6EC20C33F6BD1646 FOREIGN KEY (site_id) REFERENCES Site (id)');
        $this->addSql('ALTER TABLE State ADD CONSTRAINT FK_6252FDFFF92F3E70 FOREIGN KEY (country_id) REFERENCES Country (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Address DROP FOREIGN KEY FK_C2F3561DF6BD1646');
        $this->addSql('ALTER TABLE PhoneNumber DROP FOREIGN KEY FK_6EC20C33F6BD1646');
        $this->addSql('ALTER TABLE Client DROP FOREIGN KEY FK_C0E80163217BBB47');
        $this->addSql('ALTER TABLE Address DROP FOREIGN KEY FK_C2F3561D217BBB47');
        $this->addSql('ALTER TABLE PhoneNumber DROP FOREIGN KEY FK_6EC20C33217BBB47');
        $this->addSql('ALTER TABLE Address DROP FOREIGN KEY FK_C2F3561D8BAC62AF');
        $this->addSql('ALTER TABLE Address DROP FOREIGN KEY FK_C2F3561DF92F3E70');
        $this->addSql('ALTER TABLE State DROP FOREIGN KEY FK_6252FDFFF92F3E70');
        $this->addSql('ALTER TABLE Address DROP FOREIGN KEY FK_C2F3561D5D83CC1');
        $this->addSql('DROP TABLE Site');
        $this->addSql('DROP TABLE Client');
        $this->addSql('DROP TABLE Person');
        $this->addSql('DROP TABLE City');
        $this->addSql('DROP TABLE Country');
        $this->addSql('DROP TABLE Address');
        $this->addSql('DROP TABLE PhoneNumber');
        $this->addSql('DROP TABLE State');
    }
}
