<?php

namespace Bangdinhnfq\Unlock\Config;

use Bangdinhnfq\Unlock\Application\Route;
use Bangdinhnfq\Unlock\Controller\HomeController;
use Bangdinhnfq\Unlock\Controller\NotFoundController;
use Bangdinhnfq\Unlock\Http\Request as AppRequest;

class RouteConfig
{
    /**
     * @return Route[]
     */
    public static function getRoutes(): array
    {
        return [
            new Route(AppRequest::METHOD_GET, '/', HomeController::class, 'index'),
        ];
    }

    /**
     * @param string $requestMethod
     * @param string $requestUri
     * @return Route
     */
    public static function getNotFoundRoute(string $requestMethod, string $requestUri): Route
    {
        $requestMethod = $requestMethod . '/';
        $requestUri = $requestUri . '_';
        $controllerName = NotFoundController::class;
        $action = 'index';

        return new Route($requestMethod, $requestUri, $controllerName, $action);
    }

    /**
     * @param int $number
     * @return int
     */
    public static function fibonacci(int $number): int
    {
        // a = 1 1 2 3 5 8 13
        if ($number == 0)
            return 0;
        else if ($number == 1)
            return 1;
        else if ($number == 2)
            return 3;

        return 5;
    }
}
