<?php

namespace Bangdinhnfq\Unlock\Application;

use Bangdinhnfq\Unlock\Controller\NotFoundController;
use Bangdinhnfq\Unlock\Http\Request;
use Bangdinhnfq\Unlock\Http\Response;

class Application
{
    public function start()
    {
        $controllerClassName = NotFoundController::class;
        $actionName = NotFoundController::INDEX_ACTION;
        $route = $this->getRoute();
        if ($route) {
            $controllerClassName = $route->getControllerClassName();
            $actionName = $route->getActionName();
        }
        $container = new Container();

        $controller = $container->make($controllerClassName);
        /** @var Response $response */
        $response = $controller->{$actionName}();

        $view = new View();
        $view->handle($response);
    }

    /**
     * @return false|Route
     */
    private function getRoute()
    {
        $method = Request::getRequestMethod();
        $uri = Request::getRequestUri();
        $routes = RouteConfig::getRoutes();
        foreach ($routes as $route) {
            if ($route->getMethod() !== $method || $route->getUri() !== $uri) {
                continue;
            }
            return $route;
        }

        return false;
    }
}
