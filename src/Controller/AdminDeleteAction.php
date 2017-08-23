<?php

namespace Blog\Controller;

use Blog\Entity\Post;


class AdminDeleteAction extends MasterAction implements ActionInterface
{
    public function renderAction()
    {
        $urls = $this->getUrls();
        $postEntity = new Post();

        $post = $postEntity->getOne("id", end($urls));

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $post->delete();
        }

        header('Location: /');
    }
}
