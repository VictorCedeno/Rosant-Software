<?php

namespace MDW\RosantBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use MDW\RosantBundle\Entity\Clientes;
use MDW\RosantBundle\Form\ClientesType;

/**
 * Clientes controller.
 *
 * @Route("/clientes")
 */
class ClientesController extends Controller
{
    /**
     * Lists all Clientes entities.
     *
     * @Route("/", name="clientes")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MDWRosantBundle:Clientes')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Clientes entity.
     *
     * @Route("/", name="clientes_create")
     * @Method("POST")
     * @Template("MDWRosantBundle:Clientes:new.html.twig")
     */
    public function createAction(Request $request)
    {
        
        
        $entity  = new Clientes();
        $form = $this->createForm(new ClientesType(), $entity);
        $form->bind($request);

        
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
             $message = \Swift_Message::newInstance()
        ->setSubject('Prueba!')
        ->setFrom('jmanuelromero93@gmail.com')
        ->setTo($entity->getEmail())
        ->setBody('<h1>Bienvenido a Rosant '.$entity->getNombre().'</h1>', 'text/html');

    $this->get('mailer')->send($message);
             $this->get('session')->getFlashBag()->add('notice', 'Cliente Registrado exitosamente!');
             $entity = new Clientes();
        $form   = $this->createForm(new ClientesType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
     
      //  return $this->redirect($this->generateUrl('clientes_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Clientes entity.
     *
     * @Route("/new", name="clientes_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Clientes();
        $form   = $this->createForm(new ClientesType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Clientes entity.
     *
     * @Route("/{id}", name="clientes_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MDWRosantBundle:Clientes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Clientes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Clientes entity.
     *
     * @Route("/{id}/edit", name="clientes_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MDWRosantBundle:Clientes')->find($id);
           
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Clientes entity.');
        }

        $editForm = $this->createForm(new ClientesType(), $entity);
       
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Clientes entity.
     *
     * @Route("/{id}", name="clientes_update")
     * @Method("PUT")
     * @Template("MDWRosantBundle:Clientes:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MDWRosantBundle:Clientes')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Clientes entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ClientesType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();  
           $this->get('session')->getFlashBag()->add('notice', 'Información actualizada exitosamente!');
           return $this->redirect($this->generateUrl('clientes_edit', array('id' => $id)));
        }

        return array(
           'entity'      => $entity,
           'edit_form'   => $editForm->createView(),
           'delete_form' => $deleteForm->createView(),
       );
    }

    /**
     * Deletes a Clientes entity.
     *
     * @Route("/{id}", name="clientes_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MDWRosantBundle:Clientes')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Clientes entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('clientes'));
    }

    /**
     * Creates a form to delete a Clientes entity by id.
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
    
    function validarCI($strCedula)
{



        $nro_region=substr($strCedula, 0,2);//extraigo los dos primeros caracteres de izq a der
        if($nro_region>=1 && $nro_region<=24){// compruebo a que region pertenece esta cedula//
        $ult_digito=substr($strCedula, -1,1);//extraigo el ultimo digito de la cedula
        //extraigo los valores pares//
        $valor2=substr($strCedula, 1, 1);
        $valor4=substr($strCedula, 3, 1);
        $valor6=substr($strCedula, 5, 1);
        $valor8=substr($strCedula, 7, 1);
        $suma_pares=($valor2 + $valor4 + $valor6 + $valor8);
        //extraigo los valores impares//
        $valor1=substr($strCedula, 0, 1);
        $valor1=($valor1 * 2);
        if($valor1>9){ $valor1=($valor1 - 9); }else{ }
        $valor3=substr($strCedula, 2, 1);
        $valor3=($valor3 * 2);
        if($valor3>9){ $valor3=($valor3 - 9); }else{ }
        $valor5=substr($strCedula, 4, 1);
        $valor5=($valor5 * 2);
        if($valor5>9){ $valor5=($valor5 - 9); }else{ }
        $valor7=substr($strCedula, 6, 1);
        $valor7=($valor7 * 2);
        if($valor7>9){ $valor7=($valor7 - 9); }else{ }
        $valor9=substr($strCedula, 8, 1);
        $valor9=($valor9 * 2);
        if($valor9>9){ $valor9=($valor9 - 9); }else{ }

        $suma_impares=($valor1 + $valor3 + $valor5 + $valor7 + $valor9);
        $suma=($suma_pares + $suma_impares);
        $dis=substr($suma, 0,1);//extraigo el primer numero de la suma
        $dis=(($dis + 1)* 10);//luego ese numero lo multiplico x 10, consiguiendo asi la decena inmediata superior
        $digito=($dis - $suma);
        if($digito==10){ $digito='0'; }//si la suma nos resulta 10, el decimo digito es cero
        if ($digito==$ult_digito){//comparo los digitos final y ultimo
        echo "Cedula Correcta";
        }else{
        echo "Cedula Incorrecta";
        }
        }else{
        echo "Este Nro de Cedula no corresponde a ninguna provincia del ecuador";
        }

        }
        }
