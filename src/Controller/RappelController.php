<?php

namespace App\Controller;
use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use App\Entity\Contrat;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class RappelController extends AbstractController
{
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
    public function  __invoke( \Swift_Mailer $mailer,$id)
    {
        $repo = $this->getDoctrine()->getRepository(Contrat::class)->find($id);
        $user=  $repo->getUser()->getEmail();
        $message = (new \Swift_Message('Rappel'))
        ->setFrom('jihenabid88@gmail.com')
        ->setTo($user)
        ->setBody('la date du votre  contrat expirera bientot ');
      //  ->addPart('<q>Here is the message itself</q>', 'text/html')
      //  ->attach(Swift_Attachment::fromPath('my-document.pdf'));
        $this->mailer->send($message); 
    }
   
}