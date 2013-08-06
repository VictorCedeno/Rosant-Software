<?php

namespace MDW\RosantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MDWRosantBundle:Default:index.html.twig', array('name' => $name));
    }
}
