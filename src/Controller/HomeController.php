<?php

namespace Bangdinhnfq\Unlock\Controller;

class HomeController extends BaseController
{
    /**
     * @return string
     */
    public function indexAction(): string
    {
        return $this->view('home/index.html', [
            'data' => 'Hello from index action'
        ]);
    }
}
