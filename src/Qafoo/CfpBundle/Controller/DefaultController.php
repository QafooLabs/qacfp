<?php

namespace Qafoo\CfpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('QafooCfpBundle:Default:index.html.twig', array('name' => $name));
    }
}
