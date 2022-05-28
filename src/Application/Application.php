<?php

namespace Bangdinhnfq\Unlock\Application;

use Bangdinhnfq\Unlock\Controller\NotFoundController;
use Bangdinhnfq\Unlock\Http\Request;
use Bangdinhnfq\Unlock\Http\Response;
use Exception;

class Application
{
    public function start()
    {
        try {
            $controllerClassName = NotFoundController::class;
            $actionName = NotFoundController::INDEX_ACTION;
            $route = $this->getRoute();
            $container = new Container();
            /** @var Acl $acl */
            $acl = $container->make(Acl::class);
            $acl->setRoute($route);
            if (!$acl->canAccess()) {
                // return 403;
            }
            if ($route) {
                $controllerClassName = $route->getControllerClassName();
                $actionName = $route->getActionName();
            }

            $controller = $container->make($controllerClassName);
            /** @var Response $response */
            $response = $controller->{$actionName}();
        } catch (Exception $exception) {
            $template = 'error/internal.php';
            $response = new Response();
            $response->view($template, [], Response::HTTP_STATUS_SERVER_ERROR);
        }
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
