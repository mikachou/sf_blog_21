<?php

namespace Schuh\BlogBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Category
{
    /**
     * @MongoDB\Id
     */
    protected $id;
    
    /**
     * @MongoDB\String 
     */
    protected $name;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }
    
    public function __toString()
    {
        return $this->getName();
    }
}
