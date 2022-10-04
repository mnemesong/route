<?php

namespace Mnemesong\RouteTestUnit;

use Mnemesong\Route\Route;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class RouteTest extends TestCase
{
    public function testCreation(): void
    {
        $func = function (RequestInterface $req, ResponseInterface $res) {
            return $res;
        };
        $route = new Route('get', '/path/to', $func);
        $this->assertEquals('get', $route->getMethod());
        $this->assertEquals('/path/to', $route->getPath());
    }

    public function testStatics(): void
    {
        $func = function (RequestInterface $req, ResponseInterface $res) {
            return $res;
        };

        $route = Route::get('/path/to/get', $func);
        $this->assertEquals('get', $route->getMethod());
        $this->assertEquals('/path/to/get', $route->getPath());

        $route = Route::post('/path/to/post', $func);
        $this->assertEquals('post', $route->getMethod());
        $this->assertEquals('/path/to/post', $route->getPath());

        $route = Route::put('/path/to/put', $func);
        $this->assertEquals('put', $route->getMethod());
        $this->assertEquals('/path/to/put', $route->getPath());

        $route = Route::patch('/path/to/patch', $func);
        $this->assertEquals('patch', $route->getMethod());
        $this->assertEquals('/path/to/patch', $route->getPath());

        $route = Route::update('/path/to/update', $func);
        $this->assertEquals('update', $route->getMethod());
        $this->assertEquals('/path/to/update', $route->getPath());

        $route = Route::delete('/path/to/delete', $func);
        $this->assertEquals('delete', $route->getMethod());
        $this->assertEquals('/path/to/delete', $route->getPath());
    }
}