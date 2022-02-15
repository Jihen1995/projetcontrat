<?php

namespace App\Controller;
use ApiPlatform\Core\EventListener\EventPriorities;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use App\Entity\Contrat;
use App\Entity\User;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\ORM\EntityManagerInterface;

final class CreateContratController
{
    private $entityManager;
	private $requestStack;

	public function __construct(EntityManagerInterface $entityManager, RequestStack $requestStack)
	{
		$this->entityManager = $entityManager;
		$this->requestStack = $requestStack;
	}

   
    
    public function __invoke(ViewEvent $event): void
    {   
        $contrat = $event->getControllerResult();
        
        $method = $event->getRequest()->getMethod();

        if (!$contrat instanceof Contrat|| Request::METHOD_POST !== $method) {
            return;
        }
        
    }
}