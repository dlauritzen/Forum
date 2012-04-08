<?php

namespace DLauritz\Forum\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\Forum\ContentBundle\Entity\Category
 */
class Category {
	
    /**
     * @var bigint $id
     */
    private $id;

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var integer $rank
     */
    private $rank;

    /**
     * @var string $description
     */
    private $description;

    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Forum
     */
    private $forums;

    public function __construct()
    {
        $this->forums = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set rank
     *
     * @param integer $rank
     */
    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    /**
     * Get rank
     *
     * @return integer 
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add forums
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Forum $forums
     */
    public function addForum(\DLauritz\Forum\ContentBundle\Entity\Forum $forums)
    {
        $this->forums[] = $forums;
    }

    /**
     * Get forums
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getForums()
    {
        return $this->forums;
    }
}