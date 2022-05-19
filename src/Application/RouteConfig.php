<?php

namespace Bangdinhnfq\Unlock\Application;

use Bangdinhnfq\Unlock\Controller\Api\HomeApiController;
use Bangdinhnfq\Unlock\Controller\HomeController;
use Bangdinhnfq\Unlock\Controller\UserLoginController;
use Bangdinhnfq\Unlock\Http\Request;

class RouteConfig
{
    /**
     * @return Route[]
     */
    public static function getRoutes(): array
    {
        $app = [
            new Route(Request::METHOD_GET, '/', HomeController::class, 'indexAction'),
            new Route(Request::METHOD_GET, '/login', UserLoginController::class, 'loginAction')
        ];
        $api = [
            new Route(Request::METHOD_GET, '/api', HomeApiController::class, 'indexAction'),
        ];
        return array_merge($app, $api);
    }
}
