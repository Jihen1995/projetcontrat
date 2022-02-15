<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210913163358 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cron_job (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, command VARCHAR(255) NOT NULL, arguments VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, running_instances INT UNSIGNED DEFAULT 0 NOT NULL, max_instances INT UNSIGNED DEFAULT 1 NOT NULL, number INT UNSIGNED DEFAULT 1 NOT NULL, period VARCHAR(255) NOT NULL, last_use DATETIME DEFAULT NULL, next_run DATETIME NOT NULL, enable TINYINT(1) DEFAULT \'1\' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cron_job_result (id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL, cron_job_id BIGINT UNSIGNED NOT NULL, run_at DATETIME NOT NULL, run_time DOUBLE PRECISION NOT NULL, status_code INT NOT NULL, output LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_2CD346EE79099ED8 (cron_job_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE historique (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(255) DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL, date_reponse DATETIME DEFAULT NULL, idcontrat INT DEFAULT NULL, iduser INT DEFAULT NULL, statut VARCHAR(255) DEFAULT NULL, rappel VARCHAR(255) DEFAULT NULL, delai_reponse VARCHAR(255) NOT NULL, date_fin VARCHAR(255) NOT NULL, date_debut VARCHAR(255) NOT NULL, filename VARCHAR(255) DEFAULT NULL, filevalue LONGTEXT DEFAULT NULL, filetype VARCHAR(255) DEFAULT NULL, contrat VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail (id INT AUTO_INCREMENT NOT NULL, set_from VARCHAR(255) NOT NULL, set_to VARCHAR(255) DEFAULT NULL, set_body VARCHAR(255) NOT NULL, objet VARCHAR(255) DEFAULT NULL, filename VARCHAR(255) DEFAULT NULL, filevalue LONGTEXT DEFAULT NULL, filetype VARCHAR(255) DEFAULT NULL, file VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, contrat_id INT DEFAULT NULL, titre VARCHAR(255) DEFAULT NULL, INDEX IDX_BF5476CAA76ED395 (user_id), INDEX IDX_BF5476CA1823061F (contrat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE refresh_tokens (id INT AUTO_INCREMENT NOT NULL, refresh_token VARCHAR(128) NOT NULL, username VARCHAR(255) NOT NULL, valid DATETIME NOT NULL, UNIQUE INDEX UNIQ_9BACE7E1C74F2195 (refresh_token), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cron_job_result ADD CONSTRAINT FK_2CD346EE79099ED8 FOREIGN KEY (cron_job_id) REFERENCES cron_job (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA1823061F FOREIGN KEY (contrat_id) REFERENCES contrat (id)');
        $this->addSql('DROP TABLE test');
        $this->addSql('ALTER TABLE contrat ADD id_admin INT DEFAULT NULL, ADD statut VARCHAR(255) DEFAULT NULL, ADD filename VARCHAR(255) DEFAULT NULL, ADD filevalue LONGTEXT DEFAULT NULL, ADD filetype VARCHAR(255) DEFAULT NULL, ADD contrat VARCHAR(255) DEFAULT NULL, ADD date_signature DATETIME DEFAULT NULL, ADD commentaire VARCHAR(255) DEFAULT NULL, DROP path, DROP created_at, DROP status, CHANGE rappel rappel VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD prenom VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE role roles VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON user (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cron_job_result DROP FOREIGN KEY FK_2CD346EE79099ED8');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, last_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, first_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE cron_job');
        $this->addSql('DROP TABLE cron_job_result');
        $this->addSql('DROP TABLE historique');
        $this->addSql('DROP TABLE mail');
        $this->addSql('DROP TABLE notification');
        $this->addSql('DROP TABLE refresh_tokens');
        $this->addSql('ALTER TABLE contrat ADD path VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD created_at DATETIME NOT NULL, ADD status VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP id_admin, DROP statut, DROP filename, DROP filevalue, DROP filetype, DROP contrat, DROP date_signature, DROP commentaire, CHANGE rappel rappel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX UNIQ_8D93D649E7927C74 ON user');
        $this->addSql('ALTER TABLE user ADD role VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP roles, DROP prenom, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
