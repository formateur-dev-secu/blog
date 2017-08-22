<?php

namespace Blog\Controller;

use Blog\Entity\Post;

/**
 * Class AdminPostAction
 * @package Blog\Controller
 */
class AdminPostAction extends MasterAction implements ActionInterface
{
    public function renderAction()
    {
        $response = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $title = isset($_REQUEST['title']) ? $_REQUEST["title"] : "";
            $content = isset($_REQUEST['content']) ? $_REQUEST["content"] : "";

            $post = new Post();
            $post->setTitle($title);
            $post->setContent($content);

            $response[] = $post->create();
        }

        $this->render("admin/post", ["errors" => $response]);
    }
}