<?php

namespace Bangdinhnfq\Unlock\Controller;

abstract class BaseController
{
    protected function view($template, $options)
    {
        header('Content-Type: text/html; charset=UTF-8');
        header("HTTP/1.1 200 OK");

        return file_get_contents(getcwd() . '/src/View/' . $template);
    }
}
