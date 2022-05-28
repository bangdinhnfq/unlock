<?php

namespace Bangdinhnfq\Unlock\Application;

use Bangdinhnfq\Unlock\Controller\Api\CarApiController;
use Bangdinhnfq\Unlock\Controller\Api\HomeApiController;
use Bangdinhnfq\Unlock\Controller\Api\UserLoginApiController;
use Bangdinhnfq\Unlock\Controller\HomeController;
use Bangdinhnfq\Unlock\Controller\UserLoginController;
use Bangdinhnfq\Unlock\Model\User;

class RouteConfig
{
    /**
     * @return Route[]
     */
    public static function getRoutes(): array
    {
        return array_merge(static::getApiRoutes(), static::getAppRoutes());
    }

    /**
     * @return Route[]
     */
    public static function getAppRoutes(): array
    {
        return [
            Route::get('/', HomeController::class, 'getIndexAction'),
            Route::get('/login', UserLoginController::class, 'getLoginAction'),
            Route::post('/login', UserLoginController::class, 'postLoginAction')
        ];
    }

    /**
     * @return Route[]
     */
    public static function getApiRoutes(): array
    {
        return [
            Route::get('/api', HomeApiController::class, 'getIndexAction'),
            Route::post('/api/login', UserLoginApiController::class, 'postLoginAction'),
            Route::get('/api/cars', CarApiController::class, 'listCars', User::ROLE_MEMBER),
            Route::post('/api/cars', CarApiController::class, 'postCar', User::ROLE_ADMIN),
        ];
    }
}
