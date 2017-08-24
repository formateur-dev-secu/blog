<?php

namespace Blog\Controller;

use Blog\Entity\Log;
use Blog\Entity\Post;

/**
 * Class IndexAction
 * @package Blog\Controller
 */
class IndexAction extends MasterAction implements ActionInterface
{
    public function renderAction()
    {
        $postEntity = new Post();

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : "";
            $posts = $postEntity->findBy("title", $search);
        } else {
            $posts = $postEntity->getAll();
        }

        $log = new Log();
        $log->writeAccessLog("notice", "Access index page");

        $this->render("index", ["posts" => $posts]);
    }
}
