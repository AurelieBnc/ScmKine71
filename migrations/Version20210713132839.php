<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210713132839 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(200) NOT NULL, content VARCHAR(10000) NOT NULL, publication_date DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(200) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE diploma (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(200) NOT NULL, location VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipement (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(200) NOT NULL, image VARCHAR(255) NOT NULL, describe_equipement VARCHAR(500) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE obtention (practitioner_id INT NOT NULL, diploma_id INT NOT NULL, date_obtained DATETIME NOT NULL, INDEX IDX_7A35A2B31121EA2C (practitioner_id), INDEX IDX_7A35A2B3A99ACEB5 (diploma_id), PRIMARY KEY(practitioner_id, diploma_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE practitioner (id INT AUTO_INCREMENT NOT NULL, lastname VARCHAR(100) NOT NULL, firstname VARCHAR(100) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(200) NOT NULL, am_code VARCHAR(20) NOT NULL, overtaking INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE obtention ADD CONSTRAINT FK_7A35A2B31121EA2C FOREIGN KEY (practitioner_id) REFERENCES practitioner (id)');
        $this->addSql('ALTER TABLE obtention ADD CONSTRAINT FK_7A35A2B3A99ACEB5 FOREIGN KEY (diploma_id) REFERENCES diploma (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE obtention DROP FOREIGN KEY FK_7A35A2B3A99ACEB5');
        $this->addSql('ALTER TABLE obtention DROP FOREIGN KEY FK_7A35A2B31121EA2C');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE diploma');
        $this->addSql('DROP TABLE equipement');
        $this->addSql('DROP TABLE obtention');
        $this->addSql('DROP TABLE practitioner');
        $this->addSql('DROP TABLE service');
    }
}
