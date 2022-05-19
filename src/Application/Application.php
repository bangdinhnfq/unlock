<?php

namespace Bangdinhnfq\Unlock\Application;

use Bangdinhnfq\Unlock\Controller\HomeController;
use Bangdinhnfq\Unlock\Controller\NotFoundController;
use Bangdinhnfq\Unlock\Controller\UserLoginController;
use Bangdinhnfq\Unlock\Http\Request;
use Bangdinhnfq\Unlock\Http\Response;

class Application
{
    public function start()
    {
        $container = new Container();
        $method = Request::getRequestMethod();
        $uri = Request::getRequestUri();
        $routes = RouteConfig::getRoutes();
        $controllerClassName = NotFoundController::class;
        $actionName = NotFoundController::INDEX_ACTION;
        foreach ($routes as $route) {
            if ($route->getMethod() !== $method || $route->getUri() !== $uri) {
                continue;
            }
            $controllerClassName = $route->getControllerClassName();
            $actionName = $route->getActionName();
        }

        $controller = $container->make($controllerClassName);
        /** @var Response $response */
        $response = $controller->{$actionName}();
        http_response_code($response->getStatusCode());

        require Directory::getViewDir() . $response->getTemplate();
    }
}
