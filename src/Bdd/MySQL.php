<?php

namespace Blog\Bdd;

use Blog\Config;

/**
 * Class MySQL
 * @package Blog\Bdd
 */
class MySQL
{
    private static $bdd;

    private $pdo;

    public static function init()
    {
        if (is_null(self::$bdd)) {
            self::$bdd = new MySQL();
        }

        return self::$bdd;
    }

    /**
     * MySQL constructor.
     */
    public function __construct()
    {
        $config = Config::init();

        try {
            $this->pdo = new \PDO('mysql:host=localhost;dbname='.
                $config->getParam("dbname").';charset=utf8',
                $config->getParam("user"),
                $config->getParam("password"));
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    /**
     * @return \PDO
     */
    public function getPDO()
    {
        return $this->pdo;
    }
}