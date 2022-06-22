<?php
/**
 * тестовый роутер
 * 
 * @author Alex <billibons777@gmail.com>
 * @version 1.0
 * @package vilija19/router
 */

namespace Vilija19\Router;

/**
 * Класс  Router
 * @package vilija19/router
 */
class Router implements \Aigletter\Contracts\Routing\RouteInterface
{
    /**
     * Переменная хранящая значение типа array.
     * Этот массив хранит соответствие роута вызываемым обьектам (например контроллерам)
     * examples:
     *  '/home/index' => [ \Aigletter\App\Controllers\HomeController::class , 'index'],
     *  '/product/show'=> function () { echo('Run callback'); }
     * @var array
     * @access protected
     */
    protected $routes;
    /**
     * Переменная хранящая значение типа обьект
     * Здесь храним эксемпляр контроллера, который будет обрабатывать роут
     * @var Object
     * @access protected
     */
    protected $controller;
    /**
     * Переменная хранящая значение типа строка
     * Здесь храним название метода контроллера, который будет обрабатывать роут
     * @var string
     * @access protected
     */    
    protected $method;
    /**
     * Переменная хранящая вызываемый объект.
     * @var callable
     * @access protected
     */
    protected $outObj;

    public function __construct(array $routes = [])
    {
        $this->routes = $routes;
    }

    /**
     * Этот метод реализовывет интерфейс RouteInterface из пакета aigletter/contracts 
     * @param string $uri  - роут.
     * @return callable 
     */    
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
    /**
     * Этот метод дает возможность добавлять обработчики роутов
     * @var string $path - роут.
     * @var callable $action - обработчик
     */
    public function addRoute(string $path, $action)
    {
        if ($path && $action) {
            $this->routes[$path] = $action;
        }
    }

}