<?php

namespace Bangdinhnfq\Unlock\Application;

use Bangdinhnfq\Unlock\Controller\HomeController;
use Bangdinhnfq\Unlock\Controller\NotFoundController;
use Bangdinhnfq\Unlock\Controller\UserLoginController;
use Bangdinhnfq\Unlock\Http\Request;

class Application
{
    public function start()
    {
        $container = new Container();
        $method = Request::getRequestMethod();
        $uri = Request::getRequestUri();
        $routes = $this->getRoutes();
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
        $response = $controller->{$actionName}();
        require Directory::getViewDir() . $response->getTemplate();
    }

    /**
     * @return Route[]
     */
    protected function getRoutes(): array
    {
        return [
            new Route(Request::METHOD_GET, '/', HomeController::class, 'indexAction'),
            new Route(Request::METHOD_GET, '/login', UserLoginController::class, 'loginAction')
        ];
    }
}
