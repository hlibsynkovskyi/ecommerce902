<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190607165047 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE attribute_value (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, attribute_id INT NOT NULL, value_id INT DEFAULT NULL, INDEX IDX_FE4FBB824584665A (product_id), INDEX IDX_FE4FBB82B6E62EFA (attribute_id), INDEX IDX_FE4FBB82F920BBA2 (value_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE attribute_value ADD CONSTRAINT FK_FE4FBB824584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE attribute_value ADD CONSTRAINT FK_FE4FBB82B6E62EFA FOREIGN KEY (attribute_id) REFERENCES attribute (id)');
        $this->addSql('ALTER TABLE attribute_value ADD CONSTRAINT FK_FE4FBB82F920BBA2 FOREIGN KEY (value_id) REFERENCES attribute_case (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE attribute_value');
    }
}
