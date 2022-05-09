<?php

namespace Vilija19\Router;


class Router implements \Aigletter\Contracts\Routing\RouteInterface
{
    protected $routes;
    protected $controller;
    protected $method;
    protected $outObj;

    public function __construct(array $routes = [])
    {
        $this->routes = $routes;
    }

    public function route(string $uri): callable
    {

        if (isset($this->routes[$uri]) && is_array($this->routes[$uri])) {

            $actionInfo = $this->routes[$uri];

            if (class_exists($actionInfo[0])) {
                $this->controller = new $actionInfo[0];
            }else{
                throw new \Exception("Error. Router class not found", 1);
            }  

            if (method_exists($this->controller, $actionInfo[1])) {
                $this->method = $actionInfo[1];
            }else{
                throw new \Exception("Error. Router method not found", 1);
            }

            $this->outObj = [$this->controller, $this->method];

        }elseif (isset($this->routes[$uri]) && is_callable($this->routes[$uri])) {

            $this->outObj = $this->routes[$uri];

        }else{
            
            throw new \Exception("Error. Route not found", 1);
        }

        return function () { 
            return call_user_func($this->outObj);
        };

    }

    public function addRoute(string $path, $action)
    {
        if ($path && $action) {
            $this->routes[$path] = $action;
        }
    }

}