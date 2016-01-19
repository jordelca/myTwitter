<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\Tests\Fixtures\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\UserBundle\Controller\SecurityController as BaseController;
use AppBundle\Form\RegistrationType;

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
     * @Route("/register", name="register")
     * @Template("AppBundle:Default:register.html.twig")
     */
    public function registerAction(Request $request){


        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm($this->get('app.form.registration'), new \UserBundle\Entity\User());

        $form->handleRequest($request);


        if ($form->isValid()) {
            $registration = $form->getData();

            $em->persist($registration);
            $em->flush();

            $this->addFlash(
                'notice',
                'Your changes were saved!'
            );

            return $this->redirectToRoute('login');
        }

        return $this->render(
            'AppBundle:Security:register.html.twig',
            array('form' => $form->createView())
        );
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
