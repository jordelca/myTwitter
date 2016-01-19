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
     * @Route("/", name="manager")
     * @Method("GET")
     * @Template()
     */
    public function managerAction()
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $userList = $userManager->findUsers();


        return $this->render('AppBundle:Admin:manager.html.twig', array('users' => $userList));
    }

    /**
     * @Route("/manageuser/{id}", name="manageuser")
     * @Method("GET")
     * @Template()
     */
    public function manageUserAction($id)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id'=>$id));


        return $this->render('AppBundle:Admin:manageUser.html.twig', array('user' => $user));
    }

}
