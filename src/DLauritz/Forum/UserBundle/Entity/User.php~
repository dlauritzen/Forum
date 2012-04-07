<?php

namespace DLauritz\Forum\UserBundle\Entity;

use \Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface {
	
	public function equals(UserInterface $other) {
		return $this->getUsername() === $other->getUsername();
	}
	
	public function getSalt() {
		return "452983f7bbd83ad2a46af5481feb5ccb";
	}
	
	public function eraseCredentials() {
		$this->password = "";
	}
	
	public function getRoles() {
		return array(
			'ROLE_USER'
		);
	}
	
    /**
     * @var bigint $id
     */
    private $id;

    /**
     * @var string $username
     */
    private $username;

    /**
     * @var string $password
     */
    private $password;

    /**
     * @var string $display_name
     */
    private $display_name;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string $avatar
     */
    private $avatar;

    /**
     * @var datetime $joined
     */
    private $joined;


    /**
     * Get id
     *
     * @return bigint 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set display_name
     *
     * @param string $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->display_name = $displayName;
    }

    /**
     * Get display_name
     *
     * @return string 
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set avatar
     *
     * @param string $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * Get avatar
     *
     * @return string 
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set joined
     *
     * @param datetime $joined
     */
    public function setJoined($joined)
    {
        $this->joined = $joined;
    }

    /**
     * Get joined
     *
     * @return datetime 
     */
    public function getJoined()
    {
        return $this->joined;
    }
	
    /**
     * @var string $timezone
     */
    private $timezone;


    /**
     * Set timezone
     *
     * @param string $timezone
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * Get timezone
     *
     * @return string 
     */
    public function getTimezone()
    {
        return $this->timezone;
    }
}