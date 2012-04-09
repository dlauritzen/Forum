<?php

namespace DLauritz\Forum\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller {
	
	public function indexAction() {
		$em = $this->getDoctrine()->getEntityManager();
		$rank = 0;
		if ($this->get('security.context')->isGranted('ROLE_USER')) {
			$rank = $this->get('security.context')->getToken()->getUser()->getRank();
		}
		
		$query = $em->createQuery(
				'SELECT c FROM DLauritzForumContentBundle:Category c WHERE c.rank <= :rank ORDER BY c.rank DESC'
				)->setParameter('rank', $rank);
		
		$cats = $query->getResult();
		return $this->render('DLauritzForumContentBundle:Index:index.html.twig', 
				array('categories' => $cats));
	}
	
	public function searchAction() {
		// TODO Make this actually work!
		return $this->render('DLauritzForumContentBundle:Index:index.html.twig');
	}
	
	public function viewForumAction($id, $_format) {
		$forum = $this->getDoctrine()->getRepository('DLauritzForumContentBundle:Forum')
				->find($id);
		
		if ($forum) {
			return $this->render('DLauritzForumContentBundle:Forum:view.'.$_format.'.twig',
					array('forum' => $forum));
		} else {
			$this->get('session')->setFlash('error', "Couldn't find forum id " . $id .".");
			return $this->redirect($this->generateUrl('index'));
		}
	}
	
	public function viewCategoryAction($id, $_format) {
		$category = $this->getDoctrine()->getRepository('DLauritzForumContentBundle:Category')
				->find($id);
		
		if ($category) {
			return $this->render('DLauritzForumContentBundle:Category:view.'.$_format.'.twig',
					array('category' => $category));
		} else {
			$this->get('session')->setFlash('error', "Couldn't find category id " . $id .".");
			return $this->redirect($this->generateUrl('index'));
		}
	}
	
}
