<?php

namespace Bangdinhnfq\Unlock\Application;

use Bangdinhnfq\Unlock\Http\Response;

class View
{
    /**
     * @param Response $response
     * @return void
     */
    public function handle(Response $response)
    {
        http_response_code($response->getStatusCode());
        if (!empty($response->getTemplate())) {
            require Directory::getViewDir() . $response->getTemplate();
        }
        if(!empty($response->getData())){
            echo $response->getData();
        }
    }
}
