<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200411205113 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE product_categorie_discount (id INT AUTO_INCREMENT NOT NULL, categorie_id_id INT NOT NULL, discount_value INT NOT NULL, discount_unit VARCHAR(255) NOT NULL, date_created DATETIME NOT NULL, valid_until DATETIME NOT NULL, coupon_code VARCHAR(255) NOT NULL, min_order_value INT NOT NULL, max_discount_amount INT NOT NULL, UNIQUE INDEX UNIQ_2BB170188A3C7387 (categorie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_discount (id INT AUTO_INCREMENT NOT NULL, product_id_id INT NOT NULL, discount_val INT NOT NULL, product_unit VARCHAR(255) NOT NULL, date_created DATETIME NOT NULL, coupon_code VARCHAR(255) NOT NULL, min_order_value INT NOT NULL, max_discount_amount INT NOT NULL, UNIQUE INDEX UNIQ_2A50DE99DE18E50B (product_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_categorie_discount ADD CONSTRAINT FK_2BB170188A3C7387 FOREIGN KEY (categorie_id_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE product_discount ADD CONSTRAINT FK_2A50DE99DE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id)');
        $this->addSql('DROP TABLE pro');
        $this->addSql('ALTER TABLE product CHANGE photo photo VARCHAR(255) NOT NULL, CHANGE couleur couleur VARCHAR(255) NOT NULL, CHANGE forme forme VARCHAR(255) NOT NULL, CHANGE marque marque VARCHAR(255) NOT NULL, CHANGE type type VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE pro (designation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prix DOUBLE PRECISION NOT NULL, photo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, couleur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, forme VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, marque VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('DROP TABLE product_categorie_discount');
        $this->addSql('DROP TABLE product_discount');
        $this->addSql('ALTER TABLE product CHANGE photo photo VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE couleur couleur VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE forme forme VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE marque marque VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE type type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
