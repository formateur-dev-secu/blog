<?php
/**
 * index.php
 */

require_once ('vendor/autoload.php');
require_once ('src/Autoloader.php');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__);

\Blog\Autoloader::register();
\Blog\Routing::routing();

