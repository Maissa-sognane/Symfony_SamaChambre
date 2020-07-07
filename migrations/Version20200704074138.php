<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200704074138 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, pwd VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE boursier (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT DEFAULT NULL, type_bourse_id INT DEFAULT NULL, chambre_id INT DEFAULT NULL, ishoused TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_CAE21B51DDEAB1A3 (etudiant_id), INDEX IDX_CAE21B51FAA19CC1 (type_bourse_id), INDEX IDX_CAE21B519B177F54 (chambre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE chambre (id INT AUTO_INCREMENT NOT NULL, numero_batiment VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, matricule VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE non_boursier (id INT AUTO_INCREMENT NOT NULL, etudiant_id INT DEFAULT NULL, adresse VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B49F65DBDDEAB1A3 (etudiant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_bourse (id INT AUTO_INCREMENT NOT NULL, libele VARCHAR(255) NOT NULL, montant INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_chambre (id INT AUTO_INCREMENT NOT NULL, chambre_id INT DEFAULT NULL, categorie VARCHAR(255) NOT NULL, INDEX IDX_ED288B0A9B177F54 (chambre_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE boursier ADD CONSTRAINT FK_CAE21B51DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE boursier ADD CONSTRAINT FK_CAE21B51FAA19CC1 FOREIGN KEY (type_bourse_id) REFERENCES type_bourse (id)');
        $this->addSql('ALTER TABLE boursier ADD CONSTRAINT FK_CAE21B519B177F54 FOREIGN KEY (chambre_id) REFERENCES chambre (id)');
        $this->addSql('ALTER TABLE non_boursier ADD CONSTRAINT FK_B49F65DBDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE type_chambre ADD CONSTRAINT FK_ED288B0A9B177F54 FOREIGN KEY (chambre_id) REFERENCES chambre (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE boursier DROP FOREIGN KEY FK_CAE21B519B177F54');
        $this->addSql('ALTER TABLE type_chambre DROP FOREIGN KEY FK_ED288B0A9B177F54');
        $this->addSql('ALTER TABLE boursier DROP FOREIGN KEY FK_CAE21B51DDEAB1A3');
        $this->addSql('ALTER TABLE non_boursier DROP FOREIGN KEY FK_B49F65DBDDEAB1A3');
        $this->addSql('ALTER TABLE boursier DROP FOREIGN KEY FK_CAE21B51FAA19CC1');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE boursier');
        $this->addSql('DROP TABLE chambre');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE non_boursier');
        $this->addSql('DROP TABLE type_bourse');
        $this->addSql('DROP TABLE type_chambre');
    }
}
