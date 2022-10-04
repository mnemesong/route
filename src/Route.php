<?php

namespace Mnemesong\Route;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Route
{
    protected string $path;
    protected string $method;
    protected \Closure $action;

    /**
     * @param string $path
     * @param string $method
     * @param \Closure $action
     */
    public function __construct(string $method, string $path, \Closure $action)
    {
        $this->path = $path;
        $this->method = $method;
        $this->action = $action;
    }

    /**
     * @param ServerRequestInterface $req
     * @param ResponseInterface $res
     * @return ResponseInterface
     */
    public function action(ServerRequestInterface $req, ResponseInterface $res): ResponseInterface
    {
        return $this->action($req, $res);
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $path
     * @param \Closure $action
     * @return self
     */
    public static function get(string $path, \Closure $action): self
    {
        return new self('get', $path, $action);
    }

    /**
     * @param string $path
     * @param \Closure $action
     * @return self
     */
    public static function post(string $path, \Closure $action): self
    {
        return new self('post', $path, $action);
    }

    /**
     * @param string $path
     * @param \Closure $action
     * @return self
     */
    public static function put(string $path, \Closure $action): self
    {
        return new self('put', $path, $action);
    }

    /**
     * @param string $path
     * @param \Closure $action
     * @return self
     */
    public static function patch(string $path, \Closure $action): self
    {
        return new self('patch', $path, $action);
    }

    /**
     * @param string $path
     * @param \Closure $action
     * @return self
     */
    public static function delete(string $path, \Closure $action): self
    {
        return new self('delete', $path, $action);
    }

    /**
     * @param string $path
     * @param \Closure $action
     * @return self
     */
    public static function update(string $path, \Closure $action): self
    {
        return new self('update', $path, $action);
    }
}