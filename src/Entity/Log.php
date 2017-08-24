<?php

namespace Blog\Entity;

/**
 * Class Log
 * @package Blog\Entity
 */
class Log
{
    /**
     * @var string $access
     */
    private $access;

    /**
     * @var string $errors
     */
    private $errors;

    /**
     * Log constructor.
     */
    public function __construct()
    {
        $this->access = "tmp/logs/access.log";
        $this->errors = "tmp/logs/errors.log";

        if (!file_exists($this->access)){
            file_put_contents($this->access, "");
        }

        if (!file_exists($this->errors)){
            file_put_contents($this->errors, "");
        }
    }

    /**
     * @param String $type
     * @param String $message
     */
    public function writeAccessLog($type, $message)
    {
        file_put_contents($this->access,
            "[".$type."]".date("[j/m/y H:i:s]")." - $message \r\n", FILE_APPEND | LOCK_EX);
    }

    /**
     * @param String $type
     * @param String $message
     */
    public function writeErrorLog($type, $message)
    {
        file_put_contents($this->errors,
            "[".$type."]".date("[j/m/y H:i:s]")." - $message \r\n", FILE_APPEND | LOCK_EX);
    }
}
