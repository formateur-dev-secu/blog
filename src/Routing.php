<?php

namespace Blog;

use Blog\Controller\ContactAction;
use Blog\Controller\IndexAction;

/**
 * Class Routing
 * @package Blog
 */
class Routing
{
    public static function routing()
    {
        $url = $_SERVER["REQUEST_URI"];
        $action = null;

        $className = substr($url, 1);

        switch ($className) {
            case "index":
                $action = new IndexAction();
                break;
            case "contact":
                $action = new ContactAction();
                break;
        }

        $action->renderAction();
    }
}
