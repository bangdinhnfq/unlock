<?php

namespace Bangdinhnfq\Unlock\Application;

use Bangdinhnfq\Unlock\Config\RouteConfig;
use Bangdinhnfq\Unlock\Http\Request;

class Application
{
    public function start()
    {
        $route = $this->getRoute();
        $controllerClassName = $route->getControllerClassName();
        $actionName = $route->getActionName();
        $controller = new $controllerClassName();

        return $controller->{$actionName};
    }

    /**
     * @return Route
     */
    protected function getRoute(): Route
    {
        $routes = RouteConfig::getRoutes();
        $requestMethod = Request::getRequestMethod();
        $requestUri = Request::getRequestUri();
        foreach ($routes as $route) {
            if ($route->match($requestMethod, $requestUri)) {
                return $route;
            }
        }

        return RouteConfig::getNotFoundRoute($requestMethod, $requestUri);
    }
}
