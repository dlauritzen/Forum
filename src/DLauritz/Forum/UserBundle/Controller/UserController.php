<?php
namespace DLauritz\Forum\UserBundle\Controller;

use DLauritz\Forum\UserBundle\Entity\User;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller {
	
	public function profileAction($id, $_format) {
		
	}
	
	public function registerCheckAction() {
		$request = $this->getRequest();
		
		if ($request->getMethod() == "POST") {
			$user = new User();
		
			$form = $this->createFormBuilder($user)
				->add('email', 'email')
				->add('password', 'repeated', array('type' => 'password'))
				->add('display_name')
				->getForm();
			$form->bindRequest($request);
			
			if ($form->isValid()) {
				// Fill non-form fields with defaults
				$user->setJoined(new \DateTime());
				$user->setVerfied(false);
				$user->setAvatar('');
				$user->setRank(1);
				$user->setTimezone(date_default_timezone_get());
				
				// Encrypt the password
				$password = $user->getPassword();
				$this->get('session')->setFlash('info', "Encoding password " . $password);
				$factory = $this->get('security.encoder_factory');
				$encoder = $factory->getEncoder($user);
				$password = $encoder->encodePassword($password, $user->getSalt());
				$user->setPassword($password);
				
				$em = $this->getDoctrine()->getEntityManager();
				$em->persist($user);
				$em->flush();
				$this->get('session')->setFlash('success', "You were registered successfully. "
					. "Once you answer our verification email, you'll be able to participate "
					. "in the form.");
				// Success,
				return $this->redirect($this->generateUrl('index'));
			} else {
				// Invalid
				$this->get('session')->setFlash('error', "Invalid form data");
				return $this->redirect($this->generateUrl('register'));
			}
		} else {
			// Show register form
			return $this->redirect($this->generateUrl('register'));
		}
	}
	
	public function registerAction() {
		$request = $this->getRequest();
		$user = new User();
		
		$form = $this->createFormBuilder($user)
				->add('email', 'email')
				->add('password', 'repeated', array('type' => 'password'))
				->add('display_name', 'text', array('required' => true))
				->getForm();
		
		if ($request->getMethod() == "POST") {
			// This should only happen now if they failed validation
			$form->bindRequest($request);
		}
		
		return $this->render('DLauritzForumUserBundle:User:register.html.twig', 
				array('form' => $form->createView()));
	}
	
	public function loginAction() {
		$request = $this->getRequest();
        $session = $request->getSession();
		
		$user = new User();
		$form = $this->createFormBuilder($user)
				->getForm();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }
		
		return $this->render('DLauritzForumUserBundle:User:login.html.twig', array(
            // last username entered by the user
            'last_email' => $session->get(SecurityContext::LAST_USERNAME),
            'error' => $error,
			'form' => $form->createView()
        ));
	}
	
}

