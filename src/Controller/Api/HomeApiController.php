<?php

namespace Bangdinhnfq\Unlock\Controller\Api;

use Bangdinhnfq\Unlock\Http\Response;

class HomeApiController extends AbstractApiController
{
    public function indexAction(): Response
    {
        return $this->response->success(
            [
                'name' => 'Unlock API',
                'version' => '1.0'
            ]
        );
    }
}
