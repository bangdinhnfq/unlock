<?php

namespace Bangdinhnfq\Unlock\Http;

use Bangdinhnfq\Unlock\Transformer\TransformerInterface;

class Response
{
    const HTTP_STATUS_OK = 200;
    const HTTP_STATUS_NOT_FOUND = 404;

    /**
     * @var int
     */
    protected int $statusCode;

    /**
     * @var string
     */
    protected string $template;

    /**
     * @var array
     */
    protected array $options;

    /**
     * @param int $statusCode
     * @param string $template
     * @param array $options
     * @return $this
     */
    public function view(int $statusCode, string $template, array $options = []): Response
    {
        $this->statusCode = $statusCode;
        $this->template = $template;
        $this->options = $options;

        return $this;
    }

    public function success(array $data): Response
    {
        return $this;
    }

    public function error($message = 'Error'): Response
    {
        return $this;
    }

    public function redirect(string $route): Response
    {
        return $this;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     * @return Response
     */
    public function setStatusCode(int $statusCode): Response
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @param string $template
     * @return Response
     */
    public function setTemplate(string $template): Response
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @param array $options
     * @return Response
     */
    public function setOptions(array $options): Response
    {
        $this->options = $options;
        return $this;
    }
}
