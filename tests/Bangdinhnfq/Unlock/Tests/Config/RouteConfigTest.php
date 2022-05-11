<?php

declare(strict_types=1);

namespace Bangdinhnfq\Unlock\Tests\Config;

use Bangdinhnfq\Unlock\Application\Route;
use Bangdinhnfq\Unlock\Config\RouteConfig;
use Bangdinhnfq\Unlock\Controller\NotFoundController;
use PHPUnit\Framework\TestCase;

class RouteConfigTest extends TestCase
{
    public function testGetNotFoundRoute()
    {
        $routeConfig = new RouteConfig();
        $requestMethod = 'method';
        $requestUri = 'uri';
        $route = $routeConfig::getNotFoundRoute($requestMethod, $requestUri);
        $expectedRoute = new Route('method', 'uri', NotFoundController::class, 'index');
        $this->assertEquals($expectedRoute, $route);
    }

    /**
     * @dataProvider fibonacciDataProvider
     * @return void
     */
    public function testFibonacci($params, $expected)
    {
        $result = RouteConfig::fibonacci($params['number']);

        $this->assertEquals($expected, $result);
    }

    /**
     * @return array[]
     */
    public function fibonacciDataProvider(): array
    {
        return [
            'case-with-number-is-one' => [
                'params' => [
                    'number' => 1
                ],
                'expected' => 1
            ],
            'case-with-number-is-zero' => [
                'params' => [
                    'number' => 0
                ],
                'expected' => 0
            ],
            'case-with-number-is-two' => [
                'params' => [
                    'number' => 2
                ],
                'expected' => 3
            ]
        ];
    }
}
