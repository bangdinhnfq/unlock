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
        return $_SERVER['REQUEST_METHOD'] ?? self::METHOD_GET;
    }

    /**
     * @return string
     */
    public static function getRequestUri(): string
    {
        return $_SERVER['REQUEST_URI'] ?? '/';
    }

    public function getFormParams()
    {
        return [];
    }

    public function getRequestBody()
    {
        return file_get_contents('php://input');
    }

    public function getRequestJsonBody()
    {
        $data = file_get_contents('php://input');

        return json_decode($data, true);
    }

    public function isGet(): bool
    {
        return true;
    }

    public function getTokenHeader()
    {
        return $_SERVER['HTTP_AUTHORIZATION'] ?? null;
    }
}
