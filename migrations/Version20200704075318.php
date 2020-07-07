<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200704075318 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambre ADD typechambre_id INT DEFAULT NULL, ADD numero_chambre VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE chambre ADD CONSTRAINT FK_C509E4FF624D9F59 FOREIGN KEY (typechambre_id) REFERENCES type_chambre (id)');
        $this->addSql('CREATE INDEX IDX_C509E4FF624D9F59 ON chambre (typechambre_id)');
        $this->addSql('ALTER TABLE type_chambre DROP FOREIGN KEY FK_ED288B0A9B177F54');
        $this->addSql('DROP INDEX IDX_ED288B0A9B177F54 ON type_chambre');
        $this->addSql('ALTER TABLE type_chambre DROP chambre_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE chambre DROP FOREIGN KEY FK_C509E4FF624D9F59');
        $this->addSql('DROP INDEX IDX_C509E4FF624D9F59 ON chambre');
        $this->addSql('ALTER TABLE chambre DROP typechambre_id, DROP numero_chambre');
        $this->addSql('ALTER TABLE type_chambre ADD chambre_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type_chambre ADD CONSTRAINT FK_ED288B0A9B177F54 FOREIGN KEY (chambre_id) REFERENCES chambre (id)');
        $this->addSql('CREATE INDEX IDX_ED288B0A9B177F54 ON type_chambre (chambre_id)');
    }
}
