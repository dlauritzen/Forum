<?php

namespace DLauritz\Forum\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SearchController extends Controller {
	
	public function formAction() {
		$qstr = $this->getRequest()->get('q');
		if (strlen($qstr) != 0) {
			return $this->redirect($this->generateUrl('search_query', array('query' => $qstr)));
		} else {
			$this->get('session')->setFlash('warning', "Bad search url.");
			return $this->redirect($this->generateUrl('index'));
		}
	}
	
	public function queryAction($query, $_format) {
		return $this->render('DLauritzForumContentBundle:Search:query.'.$_format.'.twig',
				array('query' => $query));
	}
	
}
