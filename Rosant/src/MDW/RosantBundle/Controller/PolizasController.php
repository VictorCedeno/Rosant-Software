<?php

namespace MDW\RosantBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MDW\RosantBundle\Entity\Polizas;
use MDW\RosantBundle\Form\PolizasType;

/**
 * Polizas controller.
 *
 * @Route("/polizas")
 */
class PolizasController extends Controller
{
    /**
     * Lists all Polizas entities.
     *
     * @Route("/", name="polizas")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MDWRosantBundle:Polizas')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Polizas entity.
     *
     * @Route("/", name="polizas_create")
     * @Method("POST")
     * @Template("MDWRosantBundle:Polizas:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Polizas();
        $form = $this->createForm(new PolizasType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add('notice', 'Póliza Registrada exitosamente!');
              $entity = new Polizas();
            $form= $this->createForm(new PolizasType(), $entity);

            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Polizas entity.
     *
     * @Route("/new/{cedula}/{nombre}/{apellido}", name="polizas_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction($cedula,$nombre,$apellido)
    {
        
        $entity = new Polizas();
        $entity->setCliente($cedula);
        $form   = $this->createForm(new PolizasType(), $entity);
       $name=$nombre;
        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'nombre'   => $name,
            'apellido'   => $apellido,
        );
    }
    

    /**
     * Finds and displays a Polizas entity.
     *
     * @Route("/{id}", name="polizas_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MDWRosantBundle:Polizas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Polizas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
        
        
    }

    /**
     * Displays a form to edit an existing Polizas entity.
     *
     * @Route("/{id}/edit", name="polizas_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('MDWRosantBundle:Polizas')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Polizas entity.');
        }
        
        $editForm = $this->createForm(new PolizasType(), $entity);
        
        
 
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Polizas entity.
     *
     * @Route("/{id}", name="polizas_update")
     * @Method("PUT")
     * @Template("MDWRosantBundle:Polizas:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MDWRosantBundle:Polizas')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Polizas entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PolizasType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
           $this->get('session')->getFlashBag()->add('notice', 'Informacion actualizada exitosamente!');
          //  return $this->redirect($this->generateUrl('polizas'));
             
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Polizas entity.
     *
     * @Route("/{id}", name="polizas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MDWRosantBundle:Polizas')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Polizas entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('polizas'));
    }

    /**
     * Creates a form to delete a Polizas entity by id.
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
