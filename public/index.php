<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__."/../config/config.php");
// spl_autoload_register(function ($class_name) {
//     include $class_name . '.php';
// });

require_once __DIR__ . "/../Autoloader.php";
// $autoloader = new Autoloader;
// $autoloader->register();
Autoloader::register();
//print_r($_SERVER);
//echo $_SERVER['REQUEST_URI'];exit;
// $route1  = new Route("/", "HomeController@index");
// $route2  = new Route("/user/index", "UserController@index");
// $route3  = new Route("/error", "ErrorController");
// $router  = new Router(array($route1, $route2));

include (ROUTE_PATH); // create and return router object;

$container  = new Container();
$dispatcher = new Dispatcher($container);
$response   = new Response();
//$request  = new Request($_SERVER['REQUEST_URI']);
$request = Request::createFromGlobals();

$frontController = new FrontController($router, $dispatcher);
$frontController->run($request, $response);