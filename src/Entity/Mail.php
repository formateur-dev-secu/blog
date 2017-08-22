<?php

namespace Blog\Entity;

/**
 * Class Mail
 */
class Mail
{
    private $title;

    private $email;

    private $content;

    /**
     * Mail constructor.
     * @param $title
     * @param $email
     * @param $content
     */
    public function __construct($title, $email, $content)
    {
        $this->title = $title;
        $this->email = $email;
        $this->content = $content;
    }

    private function checkMail()
    {
        $errors = [];
        if (strlen($this->title) < 1) {
            $errors[] = "Vous devez renseigner le champ titre";
        }
        if (strlen($this->email) < 1) {
            $errors[] = "Vous devez renseigner le champ email";
        }
        if (strlen($this->content) < 1) {
            $errors[] = "Vous devez renseigner le champ message";
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Vous devez renseigner une adresse email valide";
        }

        return $errors;
    }

    public function sendMail()
    {
        $errors = $this->checkMail();

        if ($errors) {
            return $errors;
        } else {
            //TODO Send Mail action to: aston-dev12@yopmail.com
            mail("aston-dev12@yopmail.com",
                $this->title, 
                $this->content." ".$this->email);
            return ["Votre message à bien été envoyé."];
        }
    }
}
