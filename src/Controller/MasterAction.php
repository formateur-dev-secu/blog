<?php

namespace Blog\Controller;

class MasterAction
{
    protected function render($file, $datas = [])
    {
        $path = "src/Views/" . $file . ".php";

        foreach ($datas as $key => $data) {
            ${$key} = $data;
        }

        require_once "src/Views/Common/_base.php";
    }

    protected function getUrls()
    {
        $urls = preg_split("#/#", $_SERVER['REQUEST_URI']);

        return $urls;
    }
}
