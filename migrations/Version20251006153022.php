<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251006153022 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD classroom_ref INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A7D4053F FOREIGN KEY (classroom_ref) REFERENCES classroom (ref)');
        $this->addSql('CREATE INDEX IDX_8D93D649A7D4053F ON user (classroom_ref)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A7D4053F');
        $this->addSql('DROP INDEX IDX_8D93D649A7D4053F ON user');
        $this->addSql('ALTER TABLE user DROP classroom_ref');
    }
}
