<?php
 namespace MDW\RosantBundle\Controller;
 use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 Class SitioController extends Controller{
     public function estaticaAction($pagina){
         return $this->render('MDWRosantBundle:Sitio:'.$pagina.'.html.twig');
      
    }
}       
   
    
?>
