<?php

namespace Bangdinhnfq\Unlock\Http;

class Request
{
    const METHOD_OPTION = 'OPTION';
    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';
    const METHOD_PUT = 'PUT';
    const METHOD_DELETE = 'DELETE';

    /**
     * @return string
     */
    public static function getRequestMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return string
     */
    public static function getRequestUri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getFormParams()
    {
        return [];
    }

    public function getRequestBody()
    {
        return [];
    }
}
