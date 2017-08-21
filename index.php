<?php
/**
 * index.php
 */

require_once ('vendor/autoload.php');
require_once ('src/Autoloader.php');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__);

\Blog\Autoloader::register();

$yaml = new \Symfony\Component\Yaml\Parser();
$values = $yaml
    ->parse(file_get_contents("config/parameters.yml"));

$dbParams = [
    "user" => $values["db"]["user"],
    "password" => $values["db"]["password"],
    "dbname" => $values["db"]["name"],
];

\Blog\Routing::routing();

