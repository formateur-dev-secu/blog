<?php

namespace Blog\Bdd;

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

        foreach ($data->fetchAll() as $post){
            $posts[] = $post;
        }

        return $posts;
    }

    public function create()
    {
        $data = $this->MySQL->getPDO()
            ->prepare("INSERT INTO ". $this->tableName." 
            (title, content, slug) VALUES (:title, :content, :slug) ");

        $data->execute([
           "title" => $this->getTitle(),
           "content" => $this->getContent() ,
           "slug" => $this->getSlug()
        ]);

        return "Post créer";
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
}





