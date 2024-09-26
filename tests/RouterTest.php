<?php

use App\Controllers\HomeController;
use App\Core\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase 
{
    /** @test */
    public function isRouterEmptyOnInitialization()
    {
        $router = new Router;

        $this->assertEmpty($router->routes);
    }

    /** @test */
    public function isRouteAddedToRouter()
    {
        $router = new Router;

        $router->addRoute('/', HomeController::class, 'index');

        $expected = [
            '/' => [
                'controller' => HomeController::class,
                'action' => 'index'
            ]
        ];

        $this->assertEquals($expected, $router->routes);
    }

    /** @test */
    public function isExceptionThrownOnBadRouteArgument()
    {
        $router = new Router;
        $this->expectException(\Exception::class);
        $router->dispatch('/single', HomeController::class, 'show');
    }
}