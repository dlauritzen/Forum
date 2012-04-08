<?php

namespace DLauritz\Forum\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\Forum\ContentBundle\Entity\Thread
 */
class Thread
{
    /**
     * @var bigint $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Post
     */
    private $posts;

    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Forum
     */
    private $forum;

    public function __construct()
    {
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add posts
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Post $posts
     */
    public function addPost(\DLauritz\Forum\ContentBundle\Entity\Post $posts)
    {
        $this->posts[] = $posts;
    }

    /**
     * Get posts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Set forum
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Forum $forum
     */
    public function setForum(\DLauritz\Forum\ContentBundle\Entity\Forum $forum)
    {
        $this->forum = $forum;
    }

    /**
     * Get forum
     *
     * @return DLauritz\Forum\ContentBundle\Entity\Forum 
     */
    public function getForum()
    {
        return $this->forum;
    }
}