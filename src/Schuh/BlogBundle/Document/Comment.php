<?php

namespace Schuh\BlogBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Comment
{
    /**
     * @MongoDB\Id
     */
    protected $id;
    
    /**
     * @MongoDB\String
     */
    protected $text;
    
    /**
     * @MongoDB\String
     */
    protected $author;
    
    /**
     * @Gedmo\Timestampable(on="create")
     * @MongoDB\Date
     */
    protected $created;
    

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
     * Set text
     *
     * @param string $text
     * @return Comment
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Get text
     *
     * @return string $text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Comment
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * Get author
     *
     * @return string $author
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
