<?php

declare(strict_types=1);

namespace Danilocgsilva\PayloadPanacea\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241123134936 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE payload (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payload_field (payload_id INT NOT NULL, field_id INT NOT NULL, INDEX IDX_C8AE1C28D1664B27 (payload_id), INDEX IDX_C8AE1C28443707B0 (field_id), PRIMARY KEY(payload_id, field_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE payload_field ADD CONSTRAINT FK_C8AE1C28D1664B27 FOREIGN KEY (payload_id) REFERENCES payload (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE payload_field ADD CONSTRAINT FK_C8AE1C28443707B0 FOREIGN KEY (field_id) REFERENCES field (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE payload_field DROP FOREIGN KEY FK_C8AE1C28D1664B27');
        $this->addSql('ALTER TABLE payload_field DROP FOREIGN KEY FK_C8AE1C28443707B0');
        $this->addSql('DROP TABLE payload');
        $this->addSql('DROP TABLE payload_field');
    }
}
