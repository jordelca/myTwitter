<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Twit controller.
 *
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * Lists all Twit entities.
     *
     * @Route("/", name="admin")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
