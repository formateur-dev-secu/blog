<?php

namespace Blog\Controller;

use Blog\Entity\User;

/**
 * Class AdminUserAction
 * @package Blog\Controller
 */
class AdminUserAction extends MasterAction implements ActionInterface
{
    public function renderAction()
    {
        $response = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $pseudo = isset($_REQUEST['pseudo']) ? $_REQUEST["pseudo"] : "";
            $password = isset($_REQUEST['password_1']) ? $_REQUEST["password_1"] : "";
            $password2 = isset($_REQUEST['password_2']) ? $_REQUEST["password_2"] : "";

            if ($password == $password2 && strlen($password) > 1) {
                $user = new User();
                $user->setPseudo($pseudo);
                $user->setPassword($password);

                $response[] = $user->create();
            } else {
                $response[] = "Les mots de passe ne correspondent pas.";
            }

        }

        $this->render("admin/user", ["errors" => $response]);
    }
}