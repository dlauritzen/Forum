<?php

namespace DLauritz\Forum\ContentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DLauritz\Forum\ContentBundle\Entity\Post
 */
class Post
{
    /**
     * @var bigint $id
     */
    private $id;

    /**
     * @var text $content
     */
    private $content;

    /**
     * @var datetime $created
     */
    private $created;

    /**
     * @var datetime $modified
     */
    private $modified;

    /**
     * @var DLauritz\Forum\ContentBundle\Entity\Thread
     */
    private $thread;

    /**
     * @var DLauritz\Forum\UserBundle\Entity\User
     */
    private $creator;


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
     * Set content
     *
     * @param text $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return text 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set created
     *
     * @param datetime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Get created
     *
     * @return datetime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param datetime $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    /**
     * Get modified
     *
     * @return datetime 
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set thread
     *
     * @param DLauritz\Forum\ContentBundle\Entity\Thread $thread
     */
    public function setThread(\DLauritz\Forum\ContentBundle\Entity\Thread $thread)
    {
        $this->thread = $thread;
    }

    /**
     * Get thread
     *
     * @return DLauritz\Forum\ContentBundle\Entity\Thread 
     */
    public function getThread()
    {
        return $this->thread;
    }

    /**
     * Set creator
     *
     * @param DLauritz\Forum\UserBundle\Entity\User $creator
     */
    public function setCreator(\DLauritz\Forum\UserBundle\Entity\User $creator)
    {
        $this->creator = $creator;
    }

    /**
     * Get creator
     *
     * @return DLauritz\Forum\UserBundle\Entity\User 
     */
    public function getCreator()
    {
        return $this->creator;
    }
}