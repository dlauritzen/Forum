<?php

namespace DLauritz\Forum\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PagesController extends Controller
{
	
	public function creditsAction() {
		return $this->render('DLauritzForumPagesBundle:Pages:credits.html.twig');
	}
	
	public function contactAction() {
		$req = $this->getRequest();
		
		if ($req->getMethod() == "POST") {
			$message = \Swift_Message::newInstance()
					->setContentType('text/html')
					->setFrom(array('webmaster@dallinlauritzen.com' => 'Webmaster'))
					->setSubject("Forum Contact: " . $req->get('subject'))
					->setTo('dallin@dallinlauritzen.com')
					->setBody($this->renderView('DLauritzForumPagesBundle:Pages:contact_msg.html.twig', 
							array('name' => $req->get('name'),
								  'email' => $req->get('email'),
								  'subject' => $req->get('subject'),
								  'message' => $req->get('message'), 
								  'time' => time())));
			$result = $this->get('mailer')->send($message);
			
			if ($result == 0) {
				$this->get('session')->setFlash('error', "There was an error sending your message. Please try again or send directly to dallin.lauritzen@gmail.com.");
			} else {
				$this->get('session')->setFlash('success', "Your message was sent successfully.");
				return $this->redirect($this->generateUrl('index'));
			}
		}
		
		return $this->render('DLauritzForumPagesBundle:Pages:contact.html.twig');
	}
	
	public function legalAction() {
		return $this->render('DLauritzForumPagesBundle:Pages:legal.html.twig');
	}
	
}
