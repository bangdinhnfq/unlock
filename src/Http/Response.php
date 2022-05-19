<?php

namespace Bangdinhnfq\Unlock\Http;

use Bangdinhnfq\Unlock\Transformer\TransformerInterface;

class Response
{
    const HTTP_STATUS_OK = 200;

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
    public function view(int $statusCode, string $template, array $options): Response
    {
        $this->statusCode = $statusCode;
        $this->template = $template;
        $this->options = $options;

        return $this;
    }

    public function success(array $data)
    {
    }

    public function error($message = 'Error')
    {
    }
}
