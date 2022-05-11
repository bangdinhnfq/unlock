<?php

namespace Bangdinhnfq\Unlock\Controller;

use Bangdinhnfq\Unlock\Http\Request;
use Bangdinhnfq\Unlock\Http\Response;

class HomeController extends BaseController
{
    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function indexAction(Request $request, Response $response): Response
    {
        return $response->view(Response::HTTP_STATUS_OK, 'index/home.html', []);
    }
}
