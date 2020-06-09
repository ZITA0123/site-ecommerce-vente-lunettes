<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200414013909 extends AbstractMigration
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
        $this->addSql('DROP TABLE produit');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT NOT NULL, CHANGE prix prix DOUBLE PRECISION NOT NULL, CHANGE disponible disponible TINYINT(1) NOT NULL, CHANGE solde solde TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE product_discount DROP product_unit, DROP coupon_code, DROP min_order_value, DROP max_discount_amount');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lunettess (list_couleur VARCHAR(13) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_adaptable_vue VARCHAR(3) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_progressif VARCHAR(3) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_traitement_verre VARCHAR(22) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_forme VARCHAR(14) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_style VARCHAR(10) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_marque VARCHAR(18) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_type_monture VARCHAR(12) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_fabrication VARCHAR(10) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_matiere VARCHAR(17) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_nom VARCHAR(98) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_url VARCHAR(118) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_prix_monture_verres VARCHAR(10) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_prix_monture_seule VARCHAR(53) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_largeur_verre VARCHAR(5) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_hauteur_verre VARCHAR(6) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_largeur_nez VARCHAR(6) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_longeur_branche VARCHAR(6) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_type VARCHAR(23) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, list_image VARCHAR(161) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, quantite INT NOT NULL, prix DOUBLE PRECISION NOT NULL, photo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, disponible TINYINT(1) NOT NULL, solde TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT DEFAULT 1, CHANGE prix prix VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE disponible disponible TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE solde solde TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE product_discount ADD product_unit VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD coupon_code VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD min_order_value INT NOT NULL, ADD max_discount_amount INT NOT NULL');
    }
}
