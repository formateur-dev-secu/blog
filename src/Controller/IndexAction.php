<?php

namespace Blog\Controller;

/**
 * Class IndexAction
 * @package Blog\Controller
 */
class IndexAction extends MasterAction implements ActionInterface
{
    public function renderAction()
    {
        $this->render("index");
    }
}
