<?php
namespace DLauritz\Forum\UserBundle\Controller;

use DLauritz\Forum\UserBundle\Entity\User;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller {
	
	public function profileAction($username, $_format) {
		
	}
	
	public function registerAction() {
		$request = $this->getRequest();
		$user = new User();
		
		$form = $this->createFormBuilder($user)
				->add('username', 'text')
				->add('password', 'repeated', array('type' => 'password'))
				->add('email', 'email')
				->add('display_name', 'text', array('required' => false))
				->add('timezone', 'timezone', array('required' => false))
				->getForm();
		
		if ($request->getMethod() == "POST") {
			// Try to register
			$form->bindRequest($request);
			if ($form->isValid()) {
				$factory = $this->get('security.encoder_factory');
				$encoder = $factory->getEncoder($user);
				
				// Make the password encoded
				$user->setPassword($encoder->encodePassword($request->get('password'), $user->getSalt()));
				
				// Add fields not provided in the form
				$user->setAvatar('');
				$user->setJoined(new \DateTime());
				
				// Fix optional entries
				if ($user->getDisplayName() == null) {
					$user->setDisplayName('');
				}
				
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($user);
				$em->flush();
				
				$this->get('session')->setFlash('success', "You were registered! Your username is " 
						. $user->getUsername() . ".");
			
				return $this->redirect($this->generateUrl('index'));
			} else {
				$this->get('session')->setFlash('error', "Form validation failed. See errors below.");
			}
		}
		
		return $this->render('DLauritzForumUserBundle:User:register.html.twig', 
				array('form' => $form->createView()));
	}
	
	public function loginAction() {
		$request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
		
		return $this->render('DLauritzForumUserBundle:User:login.html.twig', array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));
	}
	
}

