<?php

namespace Blog\Controller;

use Blog\Entity\User;


class LoginAction extends MasterAction implements ActionInterface
{
    public function renderAction()
    {
        $response = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $user = new User();

            $pseudo = isset($_REQUEST['pseudo']) ? $_REQUEST["pseudo"] : "";
            $password = isset($_REQUEST['password']) ? $_REQUEST["password"] : "";

            $user->setPseudo($pseudo);
            $user->setPassword($password);

            if ($user->login()) {
                $response[] = "login ok.";
            } else {
                $response[] = "Le mot de passe ne correspond pas.";
            }
        }

        $this->render("admin/login", ["errors" => $response]);
    }
}