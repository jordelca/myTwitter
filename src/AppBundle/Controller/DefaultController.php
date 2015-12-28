<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\SecurityController as BaseController;

class DefaultController extends BaseController
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request){
        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('ROLE_USER')) {
            return new RedirectResponse($this->generateUrl('timeline'));
        }

        $response = BaseController::loginAction($request);
        return $response;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('ROLE_USER')) {
            return new RedirectResponse($this->generateUrl('timeline'));
        }

        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/timeline", name="timeline")
     */
    public function timelineAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:Timeline:showTimeline.html.twig');
    }
}
