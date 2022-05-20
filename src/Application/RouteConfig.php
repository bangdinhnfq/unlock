<?php

namespace Bangdinhnfq\Unlock\Application;

use Bangdinhnfq\Unlock\Controller\Api\HomeApiController;
use Bangdinhnfq\Unlock\Controller\Api\UserApiController;
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
        return array_merge(static::getApiRoutes(), static::getAppRoutes());
    }

    /**
     * @return Route[]
     */
    public static function getAppRoutes(): array
    {
        return [
            Route::get('/', HomeController::class, 'getIndexAction'),
            Route::get('/login', UserLoginController::class, 'getLoginAction')
        ];
    }

    /**
     * @return Route[]
     */
    public static function getApiRoutes(): array
    {
        return [
            Route::get('/api', HomeApiController::class, 'getIndexAction'),
            Route::post( '/api/login', UserApiController::class, 'postLoginAction'),
        ];
    }
}
