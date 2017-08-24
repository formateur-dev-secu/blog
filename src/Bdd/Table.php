<?php
/**
 * Created by PhpStorm.
 * User: formateur
 * Date: 24/08/2017
 * Time: 10:51
 */

namespace Blog\Bdd;

class Table
{
    public function getAll()
    {
        $data = $this->MySQL->getPDO()->prepare("SELECT * FROM ".
            $this->tableName);
        $data->execute();

        $entities = [];

        foreach ($data->fetchAll() as $entity) {
            $entities[] = $this->normalize($entity);
        }

        return $entities;
    }

    public function findBy($field, $value)
    {
        $data = $this->MySQL->getPDO()->prepare("SELECT * FROM ".
            $this->tableName." WHERE ". $field. " LIKE CONCAT ('%', :search, '%')" );
        $data->bindParam(":search", $value);
        $data->execute();

        $entities = [];

        foreach ($data->fetchAll() as $entity) {
            $entities[] = $this->normalize($entity);
        }

        return $entities;
    }

    public function delete()
    {
        $data = $this
            ->MySQL
            ->getPDO()
            ->prepare("DELETE FROM ". $this->tableName." WHERE id = :id");

        $data->execute(["id" => $this->getId()]);

        return "entity delete";
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
}