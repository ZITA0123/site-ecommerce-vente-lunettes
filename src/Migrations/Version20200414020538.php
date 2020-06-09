<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200414020538 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE product_categorie_discount (id INT AUTO_INCREMENT NOT NULL, categorie_id_id INT DEFAULT NULL, discount_value DOUBLE PRECISION NOT NULL, date_created DATETIME NOT NULL, valid_until DATETIME NOT NULL, UNIQUE INDEX UNIQ_2BB170188A3C7387 (categorie_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_categorie_discount ADD CONSTRAINT FK_2BB170188A3C7387 FOREIGN KEY (categorie_id_id) REFERENCES categorie (id)');
        $this->addSql('DROP TABLE lunettes');
        $this->addSql('DROP TABLE lunettess');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT NOT NULL, CHANGE prix prix DOUBLE PRECISION NOT NULL, CHANGE disponible disponible TINYINT(1) NOT NULL, CHANGE solde solde TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE product_discount ADD discount_value DOUBLE PRECISION NOT NULL, DROP discount_val, DROP product_unit, DROP coupon_code, DROP min_order_value, DROP max_discount_amount');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE lunettes (code INT NOT NULL) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('CREATE TABLE lunettess (cathegorie INT NOT NULL) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('DROP TABLE product_categorie_discount');
        $this->addSql('ALTER TABLE product CHANGE categorie_id categorie_id INT DEFAULT 1, CHANGE prix prix VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE disponible disponible TINYINT(1) DEFAULT \'1\' NOT NULL, CHANGE solde solde TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE product_discount ADD discount_val INT NOT NULL, ADD product_unit VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD coupon_code VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD min_order_value INT NOT NULL, ADD max_discount_amount INT NOT NULL, DROP discount_value');
    }
}
