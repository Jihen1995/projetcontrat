<?php
// api/src/EventSubscriber/BookMailSubscriber.php

namespace App\EventSubscriber;

use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\Mail;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

final class MailSubscriber implements EventSubscriberInterface
{
    private $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
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
        $mail = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if (!$mail instanceof Mail || Request::METHOD_POST !== $method) {
            return;
        }

        $message = (new \Swift_Message($mail->getObjet()))
            ->setFrom($mail->getSetFrom())
            ->setTo($mail->getSetTo())
            ->setBody(sprintf($mail->getSetBody()))
          //  ->attach(\Swift_Attachment::fromPath('C:\contrats\typescript.txt'));
          ->attach(new \Swift_Attachment(base64_decode( $mail->getFilevalue()),$mail->getFilename() , $mail->getFiletype()));

        $this->mailer->send($message);
    }
}