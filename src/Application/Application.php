<?php

namespace Bangdinhnfq\Unlock\Application;

use Bangdinhnfq\Unlock\Controller\UserController;

class Application
{
    public function start()
    {
        $container = new Container();
        /** @var UserController $userController */
        $userController = $container->make(UserController::class);
        $response = $userController->loginAction();
        require Directory::getViewDir() . $response->getTemplate();
    }
}
