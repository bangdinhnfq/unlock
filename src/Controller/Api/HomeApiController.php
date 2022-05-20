<?php

namespace Bangdinhnfq\Unlock\Controller\Api;

use Bangdinhnfq\Unlock\Http\Response;

class HomeApiController extends AbstractApiController
{
    public function getIndexAction(): Response
    {
        return $this->response->success(
            [
                'name' => 'Unlock API',
                'version' => '1.0'
            ]
        );
    }
}
