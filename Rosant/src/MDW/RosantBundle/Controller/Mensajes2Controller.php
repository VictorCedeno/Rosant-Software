<?php
namespace MDW\RosantBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use MDW\RosantBundle\Entity\Mensaje;
use MDW\RosantBundle\Form\MensajeType;

class MensajesController extends Controller
{
    public function newAction($name){
       $message = \Swift_Message::newInstance()
        ->setSubject('Prueba!')
        ->setFrom('jmanuelromero93@gmail.com')
        ->setTo('wallstreet_jr@hotmail.com')
        ->setBody('<h1>Bienvenido a Rosant '.$name.'</h1>', 'text/html');

    $this->get('mailer')->send($message);
     return $this->render('MDWRosantBundle:mensajes:email.txt.twig',
        array('mensaje' => $message));
    }
    
     public function nuevoAction(){
      // creating the contact entity and the form
      $contactos="hola";
         $request = $this->getRequest();
         $contacto = new Mensaje();
        $form = $this->createForm(new MensajeType(), $contacto);
       
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $this->sendEmail($contacto);
            }
        }

          return $this->render('MDWRosantBundle:mensajes:new.html.twig', array('contacto' => $contactos));
        
    
    }
    
   private function sendEmail(Mensaje $contacto) {
        $message = \Swift_Message::newInstance()
            ->setSubject($contacto->getAsunto() )
            ->setFrom($contacto->getEmail())
            ->setTo($contacto->getEmail())
            ->setBody($contacto->getEmail())
        ;
        $this->get('mailer')->send($message);
        
    }
    
   
    
}
?>