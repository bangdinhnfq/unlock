<?php

namespace Bangdinhnfq\Unlock\Controller;

use Bangdinhnfq\Unlock\Http\Response;

class HomeController extends AbstractController
{
    /**
     * @return Response
     */
    public function getIndexAction(): Response
    {
        $template = 'home/index.php'; // change 2

        return $this->response->view($template);
    }
}
