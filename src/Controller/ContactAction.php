<?php

namespace Blog\Controller;

class ContactAction implements ActionInterface
{
    public function renderAction()
    {
        require_once "src/Views/contact.php";
    }
}