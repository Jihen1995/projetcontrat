<?php
// src/Command/SendMailCommand.php
namespace App\Commands;

use Shapecode\Bundle\CronBundle\Annotation\CronJob;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Entity\User;
use App\Entity\Contrat;
use Doctrine\ORM\EntityManagerInterface;
/**
 * @CronJob("*\/5 * * * *")
 * Will be executed every 5 minutes
 */
class SendMailCommand extends Command
{
    private $mailer;
    private $entityManager;
    protected static $defaultName = 'app:send-mail';
    public function __construct(\Swift_Mailer $mailer,EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
        parent::__construct();
    }
    // the name of the command (the part after "bin/console")
    

    protected function configure(): void
    {
        $this
        // the short description shown while running "php bin/console list"
        ->setDescription('Send Mail to fournisseur')

        // the full command description shown when running the command with
        // the "--help" option
        ->setHelp('This command allows you to send mail...');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
      
        $em = $this->entityManager;
        
        // A. Access repositories
        $repo = $em->getRepository(Contrat::class);
        $resultat = $repo->createQueryBuilder('alias')
        ->where("alias.rappel = :fieldValue")
        ->setParameter("fieldValue", 'Automatique')
        ->getQuery()
        ->getResult();
        foreach($resultat as $res)
        {
            $email= $res->getUser()->getEmail();
            $message = (new \Swift_Message('Rappel'))
        ->setFrom('jihenabid88@gmail.com')
        ->setTo($email)
        ->setBody('la date du votre  contrat expirera bientot ');

        $this->mailer->send($message); 
        $output->writeln('email sent to !');

        // outputs a message without adding a "\n" at the end of the line
        $output->write($email);
        
        }
        
        
        // ... put here the code to create the user

        // this method must return an integer number with the "exit status code"
        // of the command. You can also use these constants to make code more readable

        // return this if there was no problem running the command
        // (it's equivalent to returning int(0))
        return Command::SUCCESS;

        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
    }
}