<?php

namespace Blog\Bdd;

use Blog\Entity\Post;
use League\Event\Emitter;
use League\Event\Event;

/**
 * Class TablePost
 * @package Blog\Bdd
 */
class TablePost extends Table implements TableInterface
{
    /**
     * @var MySQL $MySQL
     */
    protected $MySQL;

    /**
     * @var string $tableName
     */
    protected $tableName;

    /**
     * TablePost constructor.
     */
    public function __construct()
    {
        $this->MySQL = MySQL::init();
        $this->tableName = "post";
    }

    public function create()
    {
        $emitter = new Emitter();

        $emitter->addListener('create', function(Event $event){
           $this->createdEvent();
        });

        $emitter->emit("create");

        $data = $this->MySQL->getPDO()
            ->prepare("INSERT INTO ". $this->tableName." 
            (title, content, slug, date_created) VALUES (:title, :content, :slug, :dateCreated) ");

        $data->execute([
           "title" => $this->getTitle(),
           "content" => $this->getContent(),
           "slug" => $this->getSlug(),
           "dateCreated" => $this->getDateCreated()->format("Y-m-d H:i:s"),
        ]);

        return "Post créer";
    }

    public function update()
    {
        $emitter = new Emitter();

        $emitter->addListener('update', function(Event $event){
            $this->createdEvent();
        });

        $emitter->emit("update");

        $data = $this->MySQL->getPDO()
            ->prepare("UPDATE ".
                $this->tableName." SET title = :title, content = :content, slug = :slug WHERE id = :id");

        $data->execute([
            "id" => $this->getId(),
            "title" => $this->getTitle(),
            "content" => $this->getContent(),
            "slug" => $this->getSlug()
        ]);

        return "Post modifier";
    }

    public function createdEvent()
    {
        $this->generateSlug();
    }

    public function updateEvent()
    {
        $this->generateSlug();
    }

    protected function generateSlug()
    {
        $slug = $this->slugit($this->getTitle());
        $this->setSlug($slug);
    }

    /**
     * @param array $data
     * @return Post
     */
    public function normalize($data)
    {
        $class = new Post();
        $class->setid($data['id']);
        $class->setTitle($data['title']);
        $class->setSlug($data['slug']);
        $class->setContent($data['content']);
        $class->setDateCreated($data['date_created']);

        return $class;
    }
}





