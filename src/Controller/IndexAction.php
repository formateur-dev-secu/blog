<?php

namespace Blog\Controller;

use Blog\Bdd\MySQL;
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

        $this->render("index");
    }
}
