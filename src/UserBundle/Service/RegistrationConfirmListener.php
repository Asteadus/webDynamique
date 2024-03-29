<?php
/**
 * Created by PhpStorm.
 * User: aymer
 * Date: 31-01-19
 * Time: 12:39
 */

namespace UserBundle\Service;

use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RegistrationConfirmListener implements EventSubscriberInterface
{
    private $router;

    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationConfirmed'
        );
    }

    public function onRegistrationConfirmed(FormEvent $event)
    {
        $url = $this->router->generate('homepage');
        $event->setResponse(new RedirectResponse($url));
    }

}