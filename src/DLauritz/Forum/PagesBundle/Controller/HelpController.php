<?php

namespace DLauritz\Forum\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HelpController extends Controller {
	
	public function indexAction() {
		return $this->render('DLauritzForumPagesBundle:Help:index.html.twig');
	}
	
	public function viewAction($topic, $_format) {
		return $this->render('DLauritzForumPagesBundle:Help:viewtopic.'.$_format.'.twig',
				array('topic' => $topic));
	}
	
}