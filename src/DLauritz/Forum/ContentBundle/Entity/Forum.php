<?php

namespace DLauritz\Forum\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\Forum\ContentBundle\Entity\Forum
 */
class Forum
{
	
	public function hasParent() {
		return $this->parent != null;
	}
	
	public function hasChildren() {
		return count($this->children) != 0;
	}
	
    /**
     * @var bigint $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Forum
     */
    private $children;

    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Thread
     */
    private $threads;

    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Forum
     */
    private $parent;

    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Category
     */
    private $category;

    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    $this->threads = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add children
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Forum $children
     */
    public function addForum(\DLauritz\Forum\ContentBundle\Entity\Forum $children)
    {
        $this->children[] = $children;
    }

    /**
     * Get children
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add threads
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Thread $threads
     */
    public function addThread(\DLauritz\Forum\ContentBundle\Entity\Thread $threads)
    {
        $this->threads[] = $threads;
    }

    /**
     * Get threads
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getThreads()
    {
        return $this->threads;
    }

    /**
     * Set parent
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Forum $parent
     */
    public function setParent(\DLauritz\Forum\ContentBundle\Entity\Forum $parent)
    {
        $this->parent = $parent;
    }

    /**
     * Get parent
     *
     * @return DLauritz\Forum\ContentBundle\Entity\Forum 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set category
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Category $category
     */
    public function setCategory(\DLauritz\Forum\ContentBundle\Entity\Category $category)
    {
        $this->category = $category;
    }

    /**
     * Get category
     *
     * @return DLauritz\Forum\ContentBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }
}