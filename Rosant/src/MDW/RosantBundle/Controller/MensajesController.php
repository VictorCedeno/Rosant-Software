<?php

namespace MDW\RosantBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MDW\RosantBundle\Entity\Mensajes;
use MDW\RosantBundle\Form\MensajesType;

/**
 * Mensajes controller.
 *
 * @Route("/mensajes")
 */
class MensajesController extends Controller
{
    /**
     * Lists all Mensajes entities.
     *
     * @Route("/", name="mensajes")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MDWRosantBundle:Mensajes')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Mensajes entity.
     *
     * @Route("/", name="mensajes_create")
     * @Method("POST")
     * @Template("MDWRosantBundle:Mensajes:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Mensajes();
        $form = $this->createForm(new MensajesType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
           $message = \Swift_Message::newInstance()
        ->setSubject($entity->getAsunto())
        ->setFrom('jmanuelromero93@gmail.com')
        ->setTo($entity->getEmail())
        ->setBody($entity->getContenido());
        $this->get('mailer')->send($message);
         $this->get('session')->getFlashBag()->add('notice', 'Mensaje Enviado!');

          //  return $this->redirect($this->generateUrl('mensajes_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Mensajes entity.
     *
     * @Route("/new/{email}", name="mensajes_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($email)
    {
        $entity = new Mensajes();
        $entity->setEmail($email);
        $form   = $this->createForm(new MensajesType(), $entity);
           

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Mensajes entity.
     *
     * @Route("/{id}", name="mensajes_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MDWRosantBundle:Mensajes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mensajes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Mensajes entity.
     *
     * @Route("/{id}/edit", name="mensajes_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MDWRosantBundle:Mensajes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mensajes entity.');
        }

        $editForm = $this->createForm(new MensajesType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Mensajes entity.
     *
     * @Route("/{id}", name="mensajes_update")
     * @Method("PUT")
     * @Template("MDWRosantBundle:Mensajes:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MDWRosantBundle:Mensajes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Mensajes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MensajesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mensajes_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Mensajes entity.
     *
     * @Route("/{id}", name="mensajes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MDWRosantBundle:Mensajes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Mensajes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mensajes'));
    }

    /**
     * Creates a form to delete a Mensajes entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
