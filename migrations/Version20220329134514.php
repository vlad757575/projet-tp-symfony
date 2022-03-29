<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220329134514 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve CHANGE date_de_naissance date_de_naissance VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE prof CHANGE date_de_naissance date_de_naissance VARCHAR(20) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve CHANGE date_de_naissance date_de_naissance DATE NOT NULL');
        $this->addSql('ALTER TABLE prof CHANGE date_de_naissance date_de_naissance DATE NOT NULL');
    }
}
