<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Form\ChangeUserRoleType;

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
     * @Template()
     */
    public function manageUserAction($id)
    {

        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id' => $id));

        $request = $this->container->get('request');

        $formEditUser = $this->createForm(new ChangeUserRoleType($this->container->getParameter('security.role_hierarchy.roles'), $user));

        $formEditUser->get('roles')->setData($user->getRoles());
        $formEditUser->get('enabled')->setData($user->isEnabled());

        $formEditUser->handleRequest($request);

        if ($formEditUser->isValid()) {
            $roles= $request->request->get('user_manager')['roles'];
            $enabled= $request->request->get('user_manager')['enabled'];

            // Changing the role of the user
            $user->setRoles($roles);
            $user->setEnabled($enabled);

            // Updating the user
            $userManager->updateUser($user);
        }

        return $this->render(
            'AppBundle:Admin:manageUser.html.twig',
            array(
                'editUserForm' => $formEditUser->createView(),
                'user' => $user
            )
        );


    }

}
