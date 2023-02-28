<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230228222028 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add Order Api Structure';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE "order_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "orderLine_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "product_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE "order" (id INT NOT NULL, total_price DOUBLE PRECISION NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "orderLine" (id INT NOT NULL, product_id INT NOT NULL, order_id INT DEFAULT NULL, price DOUBLE PRECISION NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7F164D524584665A ON "orderLine" (product_id)');
        $this->addSql('CREATE INDEX IDX_7F164D528D9F6D38 ON "orderLine" (order_id)');
        $this->addSql('CREATE TABLE "product" (id INT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE "orderLine" ADD CONSTRAINT FK_7F164D524584665A FOREIGN KEY (product_id) REFERENCES "product" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "orderLine" ADD CONSTRAINT FK_7F164D528D9F6D38 FOREIGN KEY (order_id) REFERENCES "order" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE "order_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "orderLine_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE "product_id_seq" CASCADE');
        $this->addSql('ALTER TABLE "orderLine" DROP CONSTRAINT FK_7F164D524584665A');
        $this->addSql('ALTER TABLE "orderLine" DROP CONSTRAINT FK_7F164D528D9F6D38');
        $this->addSql('DROP TABLE "order"');
        $this->addSql('DROP TABLE "orderLine"');
        $this->addSql('DROP TABLE "product"');
    }
}
