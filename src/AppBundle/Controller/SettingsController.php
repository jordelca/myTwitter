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
 * Settings controller.
 * @Route("/{_locale}/settings", defaults={"_locale": "en"}, requirements={
 *     "_locale": "en|es"
 * })
 */

class SettingsController extends BaseController
{
    /**
     * @Route("/", name="settings")
     *
     */
    public function settingsAction(Request $request)
    {
        return $this->render('AppBundle:Settings:settings.html.twig', array('user' => $this->get('security.context')->getToken()->getUser()));
    }



}
