<?php

namespace UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use UserBundle\Entity\User;

class DefaultController extends Controller
{
    /**
     * @Route("/signup", name="signup")
     */
    public function createUserAction(

    )
    {
        $user = new User();
        $form = $this->createFormBuilder()
            ->add('name','text')
            ->add('surname','text')
            ->add('save','text')
            ->getForm();

        $form->handleRequest();

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('login',array('id' => $user->getId())));

        }
        return $this->render('UserBundle:Default:createUser.html.twig');
    }
}
