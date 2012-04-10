<?php

namespace DLauritz\Forum\SysopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('DLauritzForumSysopBundle:Default:index.html.twig', array('name' => $name));
    }
}
