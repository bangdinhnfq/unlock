<?php

namespace Bangdinhnfq\Unlock\Controller;

class NotFoundController extends BaseController
{
    /**
     * @return string
     */
    public function notFoundAction(): string
    {
        return $this->view('error/notFound.html', []);
    }
}
