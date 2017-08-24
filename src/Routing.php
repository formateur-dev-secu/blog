<?php

namespace Blog;

use Blog\Controller\ActionInterface;
use Blog\Controller\AdminDeleteAction;
use Blog\Controller\AdminPostAction;
use Blog\Controller\AdminUpdateAction;
use Blog\Controller\AdminUserAction;
use Blog\Controller\ContactAction;
use Blog\Controller\IndexAction;
use Blog\Controller\LostAction;
use Blog\Controller\PostAction;

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

        if ($url == '' || $url == '/') {
            $action = new IndexAction();
            $action->renderAction();
        }

        switch ($className) {
            case "contact":
                $action = new ContactAction();
                break;
            case "admin/post":
                $action = new AdminPostAction();
                break;
            case "admin/user":
                $action = new AdminUserAction();
                break;
            case strpos($className, "article"):
                $action = new PostAction();
                break;
            case strpos($className, "update"):
                $action = new AdminUpdateAction();
                break;
            case strpos($className, "delete"):
                $action = new AdminDeleteAction();
                break;
        }

        if (!$action instanceof ActionInterface) {
            $action = new LostAction();
        }

        $action->renderAction();
    }
}
