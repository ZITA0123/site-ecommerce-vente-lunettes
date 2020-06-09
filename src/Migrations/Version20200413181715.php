<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200413181715 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE lunettess');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT NOT NULL');
        $this->addSql('ALTER TABLE produits ADD l_ver VARCHAR(255) NOT NULL, ADD h_ver VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lunettess (list_couleur VARCHAR(13) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_adaptable_vue VARCHAR(3) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_progressif VARCHAR(3) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_traitement_verre VARCHAR(22) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_forme VARCHAR(14) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_style VARCHAR(10) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_marque VARCHAR(18) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_type_monture VARCHAR(12) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_fabrication VARCHAR(10) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_matiere VARCHAR(17) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_nom VARCHAR(98) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_url VARCHAR(118) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_prix_monture_verres VARCHAR(10) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_prix_monture_seule VARCHAR(53) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_largeur_verre VARCHAR(5) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_hauteur_verre VARCHAR(6) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_largeur_nez VARCHAR(6) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_longeur_branche VARCHAR(6) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_type VARCHAR(23) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_image VARCHAR(161) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT DEFAULT 1');
        $this->addSql('ALTER TABLE produits DROP l_ver, DROP h_ver');
    }
}
