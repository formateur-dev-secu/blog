<?php

namespace Blog\Controller;

use Blog\Entity\Post;

/**
 * Class PostAction
 * @package Blog\Controller
 */
class PostAction extends MasterAction implements ActionInterface
{
    public function renderAction()
    {
        $urls = $this->getUrls();

        $postEntity = new Post();
        $post = $postEntity->getOne("slug", end($urls));

        $this->render("post", ["post" => $post]);
    }
}
