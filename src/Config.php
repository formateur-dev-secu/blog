<?php

namespace Blog;

use Symfony\Component\Yaml\Parser;

/**
 * Class Config
 * @package Blog
 */
class Config
{
    private static $config;

    private $params;

    public static function init()
    {
        if (is_null(self::$config)) {
            self::$config = new Config();
        }

        return self::$config;
    }

    public function __construct()
    {
        $yaml = new Parser();
        $values = $yaml
            ->parse(file_get_contents("config/parameters.yml"));

        $this->params = [
            "user" => $values["db"]["user"],
            "password" => $values["db"]["password"],
            "dbname" => $values["db"]["name"],
        ];
    }

    public function getParam($key)
    {
        return $this->params[$key];
    }
}