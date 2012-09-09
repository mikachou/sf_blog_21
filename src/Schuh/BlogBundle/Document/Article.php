<?php

namespace Schuh\BlogBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Article
{
    /**
     * @MongoDB\Id
     */
    protected $id;
    
    /**
     * @MongoDB\ReferenceOne(targetDocument="User", mappedBy="id")
     */
    protected $author;
    
    /**
     * @MongoDB\String 
     */
    protected $title;
    
    /**
     * @MongoDB\String
     */
    protected $text;
    
    /**
     * @MongoDB\EmbedMany(targetDocument="Comment")
     */
    protected $comments;
    
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set title
     *
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Article
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
     * Add comments
     *
     * @param Schuh\BlogBundle\Document\Comment $comments
     */
    public function addComments(\Schuh\BlogBundle\Document\Comment $comments)
    {
        $this->comments[] = $comments;
    }

    /**
     * Get comments
     *
     * @return Doctrine\Common\Collections\Collection $comments
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set author
     *
     * @param Schuh\BlogBundle\Document\User $author
     * @return Article
     */
    public function setAuthor(\Schuh\BlogBundle\Document\User $author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * Get author
     *
     * @return Schuh\BlogBundle\Document\User $author
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
