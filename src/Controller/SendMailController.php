<?php

namespace App\Controller;
use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use App\Entity\TestM;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;


final class SendMailController
{
    private $entityManager;
	private $requestStack;
    private $mailer;

    public function __construct(EntityManagerInterface $entityManager, RequestStack $requestStack,\Swift_Mailer $mailer)
	{
		$this->entityManager = $entityManager;
		$this->requestStack = $requestStack;
        $this->mailer = $mailer;
	}
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => ['sendMail', EventPriorities::POST_WRITE],
        ];
    }

    public function sendMail(ViewEvent $event): void
    {
        $testm = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$testm instanceof TestM|| Request::METHOD_POST !== $method) {
            return;
        }
    }

    public function __invoke()
    {
        
        $message = (new \Swift_Message('A new book has been added'))
        ->setFrom('jihenabid88@gmail.com')
        ->setTo($data->getUser()->getEmail())
        ->setBody('The book #%d has been added.');
      //  ->addPart('<q>Here is the message itself</q>', 'text/html')
      //  ->attach(Swift_Attachment::fromPath('my-document.pdf'));
        $this->mailer->send($message);
      
        
    }
}