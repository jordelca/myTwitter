<?php

namespace UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UserBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * User controller.
 *
 * @Route("/user")
 */
class DefaultController extends Controller
{

    /**
     * Lists my Twit entities.
     *
     * @Route("/{username}", name="user_twits")
     * @Template("AppBundle:Twit:index.html.twig")
     */
    public function userTwitsAction($username)
    {
        $em = $this->getDoctrine()->getManager();
        $user =  $em->getRepository('UserBundle:User')->findOneByUsername($username);
        $entities = $this->get('app.twits')->findTwitsByUser($user);


        return array(
            'entities' => $entities,
        );
    }




}
