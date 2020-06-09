<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200225053015 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY produit_fk');
        $this->addSql('DROP INDEX produit_fk ON produit');
        $this->addSql('ALTER TABLE produit CHANGE cathegorie categorie INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE produit CHANGE categorie cathegorie INT NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT produit_fk FOREIGN KEY (cathegorie) REFERENCES categorie (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('CREATE INDEX produit_fk ON produit (cathegorie)');
    }
}
