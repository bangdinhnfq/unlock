<?php

namespace Bangdinhnfq\Unlock\Controller;

use Bangdinhnfq\Unlock\Http\Request;
use Bangdinhnfq\Unlock\Http\Response;

class NotFoundController extends BaseController
{
    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function notFoundAction(Request $request, Response $response): Response
    {
        return $response->view(Response::HTTP_STATUS_OK, 'error/notFound.html', []);
    }
}
