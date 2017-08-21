<?php

namespace Blog\Controller;

use Blog\Entity\Mail;

/**
 * Class ContactAction
 * @package Blog\Controller
 */
class ContactAction extends MasterAction implements ActionInterface
{
    public function renderAction()
    {
        $response = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $title = isset($_REQUEST['title']) ? $_REQUEST["title"] : "";
            $email = isset($_REQUEST['email']) ? $_REQUEST["email"] : "";
            $content = isset($_REQUEST['content']) ? $_REQUEST["content"] : "";

            $mail = new Mail($title, $email, $content);

            $response = $mail->sendMail();
        }

        $this->render("contact", ["errors" => $response]);
    }
}