<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240517161543 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartement ADD description VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE location ADD id_loc_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB43327F3C FOREIGN KEY (id_loc_id) REFERENCES locataire (id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CB43327F3C ON location (id_loc_id)');
        $this->addSql('ALTER TABLE user ADD name VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) DEFAULT NULL, ADD role VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartement DROP description');
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB43327F3C');
        $this->addSql('DROP INDEX IDX_5E9E89CB43327F3C ON location');
        $this->addSql('ALTER TABLE location DROP id_loc_id');
        $this->addSql('ALTER TABLE user DROP name, DROP prenom, DROP role');
    }
}
