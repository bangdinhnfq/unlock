<?php

namespace Bangdinhnfq\Unlock\Controller;

use Bangdinhnfq\Unlock\Http\Response;

class NotFoundController extends AbstractController
{
    public const INDEX_ACTION = 'index';

    public function index(): Response
    {
        $template = 'error/404.php';

        return $this->response->view(Response::HTTP_STATUS_NOT_FOUND, $template);
    }
}
