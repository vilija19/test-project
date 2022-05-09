<?php

include __DIR__ . '/vendor/autoload.php';

// Initialization and configuration
$router = new \Vilija19\Router\Router();
$router->addRoute('/page/view', [ \Vilija19\hw_10\PageController::class , 'view']);
$router->addRoute('/product/show', function () {
	 echo('Run callback');
});
$router->addRoute('/', function () {
	echo('This is homepage');
});
//var_dump($_SERVER['REQUEST_URI']);die;
// Routing
$action = $router->route($_SERVER['REQUEST_URI']);
$action();
