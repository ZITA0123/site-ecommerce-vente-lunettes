<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200411172515 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT NOT NULL, CHANGE quantite quantite INT DEFAULT NULL, CHANGE photo photo VARCHAR(255) NOT NULL, CHANGE couleur couleur VARCHAR(255) NOT NULL, CHANGE forme forme VARCHAR(255) NOT NULL, CHANGE marque marque VARCHAR(255) NOT NULL, CHANGE type type VARCHAR(255) NOT NULL, CHANGE disponible disponible TINYINT(1) NOT NULL, CHANGE solde solde TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE produit DROP cathegorie');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT DEFAULT 1 NOT NULL, CHANGE quantite quantite INT DEFAULT 50, CHANGE photo photo VARCHAR(500) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE disponible disponible TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE solde solde TINYINT(1) DEFAULT \'0\' NOT NULL, CHANGE couleur couleur VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE forme forme VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE marque marque VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE produit ADD cathegorie INT NOT NULL');
    }
}
