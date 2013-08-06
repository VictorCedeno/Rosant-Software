<?php

namespace MDW\RosantBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MDW\RosantBundle\Entity\Aseguradoras;
use MDW\RosantBundle\Form\AseguradorasType;

/**
 * Aseguradoras controller.
 *
 * @Route("/aseguradoras")
 */
class AseguradorasController extends Controller
{
    /**
     * Lists all Aseguradoras entities.
     *
     * @Route("/", name="aseguradoras")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MDWRosantBundle:Aseguradoras')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Aseguradoras entity.
     *
     * @Route("/", name="aseguradoras_create")
     * @Method("POST")
     * @Template("MDWRosantBundle:Aseguradoras:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Aseguradoras();
        $form = $this->createForm(new AseguradorasType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();   
            $this->get('session')->getFlashBag()->add('notice', 'Aseguradora Registrada exitosamente!');
            $entity = new Aseguradoras();
            $form= $this->createForm(new AseguradorasType(), $entity);

          //  return $this->redirect($this->generateUrl('aseguradoras_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Aseguradoras entity.
     *
     * @Route("/new", name="aseguradoras_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        
        $entity = new Aseguradoras();
        $form   = $this->createForm(new AseguradorasType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Aseguradoras entity.
     *
     * @Route("/{id}", name="aseguradoras_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MDWRosantBundle:Aseguradoras')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aseguradoras entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Aseguradoras entity.
     *
     * @Route("/{id}/edit", name="aseguradoras_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MDWRosantBundle:Aseguradoras')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aseguradoras entity.');
        }

        $editForm = $this->createForm(new AseguradorasType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Aseguradoras entity.
     *
     * @Route("/{id}", name="aseguradoras_update")
     * @Method("PUT")
     * @Template("MDWRosantBundle:Aseguradoras:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MDWRosantBundle:Aseguradoras')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Aseguradoras entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AseguradorasType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();        
            $this->get('session')->getFlashBag()->add('notice', 'Información actualizada exitosamente!');
           return $this->redirect($this->generateUrl('aseguradoras_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Aseguradoras entity.
     *
     * @Route("/{id}", name="aseguradoras_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MDWRosantBundle:Aseguradoras')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Aseguradoras entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('aseguradoras'));
    }

    /**
     * Creates a form to delete a Aseguradoras entity by id.
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
