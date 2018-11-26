<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181126153809 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, backlog_id INT DEFAULT NULL, bug_id INT DEFAULT NULL, content LONGTEXT NOT NULL, timestamp DATETIME NOT NULL, INDEX IDX_9474526CF1F06ABE (backlog_id), INDEX IDX_9474526CFA3DB3D5 (bug_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE backlog (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, timestamp DATETIME NOT NULL, notation INT DEFAULT NULL, INDEX IDX_2692056BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bug (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, code VARCHAR(64) DEFAULT NULL, description LONGTEXT DEFAULT NULL, timestamp DATETIME NOT NULL, notation INT DEFAULT NULL, INDEX IDX_358CBF146BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, color VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF1F06ABE FOREIGN KEY (backlog_id) REFERENCES backlog (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CFA3DB3D5 FOREIGN KEY (bug_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE backlog ADD CONSTRAINT FK_2692056BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE bug ADD CONSTRAINT FK_358CBF146BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF1F06ABE');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CFA3DB3D5');
        $this->addSql('ALTER TABLE backlog DROP FOREIGN KEY FK_2692056BF700BD');
        $this->addSql('ALTER TABLE bug DROP FOREIGN KEY FK_358CBF146BF700BD');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE backlog');
        $this->addSql('DROP TABLE bug');
        $this->addSql('DROP TABLE status');
    }
}
