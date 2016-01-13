<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Twit;
use AppBundle\Form\TwitType;

/**
 * Twit controller.
 *
 * @Route("/twit")
 */
class TwitController extends Controller
{

    /**
     * Lists all Twit entities.
     *
     * @Route("/", name="twit")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AppBundle:Twit')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Twit entity.
     *
     * @Route("/", name="twit_create")
     * @Method("POST")
     * @Template("AppBundle:Twit:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Twit();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $entity->setSrcUsrId($this->get('security.context')->getToken()->getUser());
            $entity->setCreationTime(new \DateTime('now'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('twit'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Twit entity.
     *
     * @param Twit $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Twit $entity)
    {
        $form = $this->createForm(new TwitType(), $entity, array(
            'action' => $this->generateUrl('twit_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Twit entity.
     *
     * @Route("/new", name="twit_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Twit();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Twit entity.
     *
     * @Route("/{id}", name="twit_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Twit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Twit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Twit entity.
     *
     * @Route("/{id}/edit", name="twit_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Twit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Twit entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Twit entity.
    *
    * @param Twit $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Twit $entity)
    {
        $form = $this->createForm(new TwitType(), $entity, array(
            'action' => $this->generateUrl('twit_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Twit entity.
     *
     * @Route("/{id}", name="twit_update")
     * @Method("PUT")
     * @Template("AppBundle:Twit:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Twit')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Twit entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('twit_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Twit entity.
     *
     * @Route("/{id}/delete", name="twit_delete")
     * @Method("GET")
     */
    public function deleteAction($id)
    {

            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Twit')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Twit entity.');
            }

            if ($entity.srcUsrId !== $this->get('security.context')->getToken()->getUser() ) {
                throw $this->createNotFoundException('You are not allowed to delete someone else twits.');
            }
            $em->remove($entity);
            $em->flush();


        return $this->redirect($this->generateUrl('twit'));
    }

    /**
     * Creates a form to delete a Twit entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('twit_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
