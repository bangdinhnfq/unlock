<?php

namespace Bangdinhnfq\Unlock;

use Bangdinhnfq\Unlock\Controller\HomeController;
use Bangdinhnfq\Unlock\Controller\NotFoundController;

class Application
{
    /**
     * @var HomeController
     */
    protected HomeController $homeController;

    /**
     * @var
     */
    protected $notFoundController;

    /**
     * @var string
     */
    protected $requestMethod;

    /**
     * @var string
     */
    protected $requestUri;

    /**
     * @param HomeController $homeController
     * @param NotFoundController $notFoundController
     */
    public function __construct(HomeController $homeController, NotFoundController $notFoundController)
    {
        $this->homeController = $homeController;
        $this->notFoundController = $notFoundController;
        $this->requestMethod = $_SERVER['REQUEST_METHOD'];
        $this->requestUri = $_SERVER['REQUEST_URI'];
    }

    /**
     * @return void
     */
    public function start()
    {
        $request = $this->requestMethod . ':' . $this->requestUri;
        switch ($request){
            case 'GET:/':
                $response = $this->homeController->indexAction();
                break;
            default:
                $response = $this->notFoundController->notFoundAction();
        }

        echo $response;
    }
}
