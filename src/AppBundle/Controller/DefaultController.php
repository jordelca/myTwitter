<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\Tests\Fixtures\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\UserBundle\Controller\SecurityController as BaseController;
use AppBundle\Form\RegistrationType;

/**
 *
 * Settings controller.
 * @Route("/{_locale}", defaults={"_locale": "en"}, requirements={
 *     "_locale": "en|es"
 * })
 */

class DefaultController extends BaseController
{
    /**
     * @Route("/", name="landingpage")
     */
    public function landingPageAction(Request $request){
        {
            $securityContext = $this->container->get('security.authorization_checker');
            if ($securityContext->isGranted('ROLE_USER')) {
                return new RedirectResponse($this->generateUrl('twit'));
            }
            
            // replace this example code with whatever you need
            return $this->render('AppBundle:LandingPage:showLandingPage.html.twig');
        }
    }

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
