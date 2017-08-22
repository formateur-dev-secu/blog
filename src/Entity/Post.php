<?php

namespace Blog\Entity;

use Blog\Bdd\TablePost;

/**
 * Class Post
 * @package Blog\Entity
 */
class Post extends TablePost
{
    /**
     * @var int $id
     */
    private $id;

    /**
     * @var String $title
     */
    private $title;

    /**
     * @var String $slug
     */
    private $slug;

    /**
     * @var String $content
     */
    private $content;

    /**
     * @var \DateTime $dateCreated
     */
    private $dateCreated;

    /**
     * Post constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->dateCreated = new \DateTime();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param \DateTime $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }
}
