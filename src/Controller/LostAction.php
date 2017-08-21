<?php

namespace Blog\Controller;

class LostAction extends MasterAction implements ActionInterface
{
    public function renderAction()
    {
        $this->render("lost");
    }
}
