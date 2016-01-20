<?php

namespace AppBundle\EventListener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class ForbiddenRouteListener
{

    protected $router;
    protected $user;

    public function __construct($security, $router)
    {
        $this->router= $router;
        $this->securityContext= $security;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        if($this->securityContext->isGranted('ROLE_USER')){
            if($request->getRequestUri() == $this->router->generate('fos_user_registration_register') ){
                $event->setResponse(new RedirectResponse($this->router->generate('homepage')));

            }
        }

    }
}
