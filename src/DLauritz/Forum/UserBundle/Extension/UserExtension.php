<?php

namespace DLauritz\Forum\UserBundle\Extension;

class UserExtension extends \Twig_Extension {
	
	public function getFilters() {
		return array(
			'gravatar' => new \Twig_Filter_Method($this, 'getGravatar'),
			'avatar' => new \Twig_Filter_Method($this, 'getAvatar'),
			'isSysop' => new \Twig_Filter_Method($this, 'isSysop'),
			'isAdmin' => new \Twig_Filter_Method($this, 'isAdmin'),
			'isUser' => new \Twig_Filter_Method($this, 'isUser'),
			'isGuest' => new \Twig_Filter_Method($this, 'isGuest'),
			'rankString' => new \Twig_Filter_Method($this, 'rankString')
		);
	}
	
	public function getName() {
		return 'user_extension';
	}
	
	public function getGravatar($user, $size = "80") {
		return "http://www.gravatar.com/avatar/".md5($user->getEmail()).".jpg?s=".$size."&d=mm&r=pg";
	}
	
	public function getAvatar($user, $size = "80") {
		if ($user->getAvatar() == '') {
			return $this->getGravatar($user, $size);
		} else {
			return $user->getAvatar();
		}
	}
	
	public function isSysop($user) {
		if ($user == null) {
			return false;
		}
		
		return array_search('ROLE_SYSOP', $user->getRoles()) !== false;
	}
	
	public function isAdmin($user) {
		if ($user == null) {
			return false;
		}
		
		return array_search('ROLE_ADMIN', $user->getRoles()) !== false;
	}
	
	public function isUser($user) {
		if ($user == null) {
			return false;
		}
		
		return array_search('ROLE_USER', $user->getRoles()) !== false;
	}
	
	public function isGuest($user) {
		if ($user == null) {
			return true;
		}
		
		return count($user->getRoles()) == 0;
	}
	
	public function rankString($user) {
		switch ($user->getRank()) {
			case 3:
				return "Systems Operator";
			case 2:
				return "Administrator";
			case 1:
				return "Registered User";
			default:
				return "--BAD RANK: " . $user->getRank() . "--";
		}
	}
	
}
