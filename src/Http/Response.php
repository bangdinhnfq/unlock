<?php

namespace Bangdinhnfq\Unlock\Http;

class Response
{
    const HTTP_STATUS_OK = 200;
    const HTTP_STATUS_BAD_REQUEST = 400;
    const HTTP_STATUS_NOT_FOUND = 404;

    /**
     * @var int
     */
    protected int $statusCode;

    /**
     * @var string|null
     */
    protected ?string $template = null;

    /**
     * @var array
     */
    protected array $options = [];

    /**
     * @var string|null
     */
    protected ?string $data = null;

    /**
     * @var array
     */
    protected array $headers = [];

    /**
     * @param int $statusCode
     * @param string $template
     * @param array $options
     * @return $this
     */
    public function view(string $template, array $options = [], int $statusCode = Response::HTTP_STATUS_OK): Response
    {
        $this->statusCode = $statusCode;
        $this->template = $template;
        $this->options = $options;

        return $this;
    }

    public function success(array $data = [], $statusCode = Response::HTTP_STATUS_OK): Response
    {
        $data = [
            'status' => 'success',
            'data' => $data
        ];
        $this->statusCode = $statusCode;
        $this->headers = array_merge($this->headers, [
            'Content-Type' => 'application/json'
        ]);
        $this->data = json_encode($data);

        return $this;
    }

    /**
     * @param string|null $message
     * @param int $statusCode
     * @return $this
     */
    public function error(?string $message = 'Some thing wrong', int $statusCode = Response::HTTP_STATUS_BAD_REQUEST): Response
    {
        $data = [
            'status' => 'error',
            'message' => $message
        ];
        $this->statusCode = $statusCode;
        $this->headers = array_merge($this->headers, [
            'Content-Type' => 'application/json'
        ]);
        $this->data = json_encode($data);

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
     * @return string|null
     */
    public function getTemplate(): ?string
    {
        return $this->template;
    }

    /**
     * @param string|null $template
     * @return Response
     */
    public function setTemplate(?string $template): Response
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

    /**
     * @return string|null
     */
    public function getData(): ?string
    {
        return $this->data;
    }

    /**
     * @param string|null $data
     * @return Response
     */
    public function setData(?string $data): Response
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     * @return Response
     */
    public function setHeaders(array $headers): Response
    {
        $this->headers = $headers;
        return $this;
    }
}
