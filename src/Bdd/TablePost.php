<?php

namespace Blog\Bdd;

use Blog\Entity\Post;
use League\Event\Emitter;
use League\Event\Event;

/**
 * Class TablePost
 * @package Blog\Bdd
 */
class TablePost
{
    /**
     * @var MySQL $MySQL
     */
    private $MySQL;

    private $tableName;

    /**
     * TablePost constructor.
     */
    public function __construct()
    {
        $this->MySQL = MySQL::init();
        $this->tableName = "post";
    }

    public function getAll()
    {
        $data = $this->MySQL->getPDO()->prepare("SELECT * FROM ".
            $this->tableName);
        $data->execute();

        $posts = [];

        foreach ($data->fetchAll() as $post) {
            $posts[] = $this->normalize($post);
        }

        return $posts;
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

    public function delete()
    {
        $data = $this
            ->MySQL
            ->getPDO()
            ->prepare("DELETE FROM ". $this->tableName." WHERE id = :id");

        $data->execute(["id" => $this->getId()]);

        return "post delete";
    }

    public function getOne($field, $value)
    {
        $data = $this->MySQL->getPDO()
            ->prepare("SELECT * FROM ". $this->tableName .
                " WHERE ". $field." = (:".$field.") LIMIT 1");

        $data->bindParam(":".$field, $value);
        $data->execute();

        return $this->normalize($data->fetch());
    }

    /**
     * @param $str
     * @return mixed|string
     */
    protected function slugit($str)
    {
        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = strtolower(trim($clean, '-'));
        $clean = preg_replace("/[\/_|+ -]+/", "-", $clean);

        return $clean;
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





