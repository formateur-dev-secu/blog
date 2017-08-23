<?php

namespace Blog\Controller;

use Blog\Entity\Post;

/**
 * Class AdminUpdateAction
 * @package Blog\Controller
 */
class AdminUpdateAction extends MasterAction implements ActionInterface
{
    public function renderAction()
    {
        $urls = $this->getUrls();
        $postEntity = new Post();
        $post = $postEntity->getOne("slug", end($urls));

        $response = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $title = isset($_REQUEST['title']) ? $_REQUEST["title"] : null;
            $content = isset($_REQUEST['content']) ? $_REQUEST["content"] : null;

            if ($title)
                $post->setTitle($title);

            if ($content)
                $post->setContent($content);

            $response[] = $post->update();

            header('Location: /');
        }

        $this->render("admin/update", ["post" => $post, "errors" => $response]);
    }
}
