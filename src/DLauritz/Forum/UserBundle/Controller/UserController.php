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
		
		if ($request->getMethod() == "POST") {
			// Try to register
			$factory = $this->get('security.encoder_factory');
			$user = new User();
			$encoder = $factory->getEncoder($user);
			$user->setUsername($request->get('username'));
			$user->setDisplayName($request->get('displayname'));
			$user->setPassword($encoder->encodePassword($request->get('password'), $user->getSalt()));
			$user->setAvatar('');
			$user->setEmail($request->get('email'));
			$user->setJoined(new \DateTime());
			$user->setTimezone($request->get('timezone'));
			
			$em = $this->getDoctrine()->getEntityManager();
			$em->persist($user);
			$em->flush();
			
			$this->get('session')->setFlash('success', "You were registered! Your username is " 
					. $user->getUsername() . ".");
			
			return $this->redirect($this->generateUrl('index'));
		}
		
		return $this->render('DLauritzForumUserBundle:User:register.html.twig');
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

