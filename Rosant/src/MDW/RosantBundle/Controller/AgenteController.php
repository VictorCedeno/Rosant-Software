<?php

namespace MDW\RosantBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MDW\RosantBundle\Entity\Agente;
use MDW\RosantBundle\Form\AgenteType;

/**
 * Agente controller.
 *
 * @Route("/agente")
 */
class AgenteController extends Controller
{
    /**
     * Lists all Agente entities.
     *
     * @Route("/", name="agente")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MDWRosantBundle:Agente')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Agente entity.
     *
     * @Route("/", name="agente_create")
     * @Method("POST")
     * @Template("MDWRosantBundle:Agente:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Agente();
        $form = $this->createForm(new AgenteType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add('notice', 'Agente Registrado exitosamente!');
              $entity = new Agente();
        $form   = $this->createForm(new AgenteType(), $entity);
//            return $this->redirect($this->generateUrl('agente_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Agente entity.
     *
     * @Route("/new", name="agente_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Agente();
        $form   = $this->createForm(new AgenteType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Agente entity.
     *
     * @Route("/{id}", name="agente_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MDWRosantBundle:Agente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Agente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Agente entity.
     *
     * @Route("/{id}/edit", name="agente_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MDWRosantBundle:Agente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Agente entity.');
        }

        $editForm = $this->createForm(new AgenteType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Agente entity.
     *
     * @Route("/{id}", name="agente_update")
     * @Method("PUT")
     * @Template("MDWRosantBundle:Agente:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MDWRosantBundle:Agente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Agente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AgenteType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add('notice', ' Agente editado exitosamente!');

            return $this->redirect($this->generateUrl('agente_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Agente entity.
     *
     * @Route("/{id}", name="agente_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MDWRosantBundle:Agente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Agente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('agente'));
    }

    /**
     * Creates a form to delete a Agente entity by id.
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
