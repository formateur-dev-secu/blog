<?php

namespace Blog\Bdd;


use Blog\Entity\User;
use League\Event\Emitter;
use League\Event\Event;

class TableUser extends Table implements TableInterface
{
    /**
     * @var MySQL $MySQL
     */
    protected $MySQL;

    /**
     * TableUser constructor.
     */
    public function __construct()
    {
        $this->MySQL = MySQL::init();
    }

    public function createdEvent()
    {
        $this->setPassword($this->encryptePassword($this->getPassword()));
    }

    public function updateEvent()
    {

    }

    public function normalize($data)
    {
        $user = new User();

        $user->setId($data['id']);
        $user->setPseudo($data['pseudo']);
        $user->setPassword($data['password']);
        $user->setSalt($data['salt']);
        $user->setActive($data['active']);

        return $user;
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
            (pseudo, password, salt, active) VALUES (:pseudo, :password, :salt, :active) ");

        $data->execute([
            "pseudo" => $this->getPseudo(),
            "password" => $this->getPassword(),
            "salt" => $this->getSalt(),
            "active" => $this->getActive(),
        ]);

        return "Utilisateur créer";
    }
}






