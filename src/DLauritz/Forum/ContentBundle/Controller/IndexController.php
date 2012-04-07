<?php

namespace DLauritz\Forum\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller {
	
	public function indexAction() {
		return $this->render('DLauritzForumContentBundle:Index:index.html.twig');
	}
	
	public function searchAction() {
		// TODO Make this actually work!
		return $this->render('DLauritzForumContentBundle:Index:index.html.twig');
	}
	
	public function creditsAction() {
		return $this->render('DLauritzForumContentBundle:Index:credits.html.twig');
	}
	
	public function contactAction() {
		return $this->render('DLauritzForumContentBundle:Index:contact.html.twig');
	}
	
}
