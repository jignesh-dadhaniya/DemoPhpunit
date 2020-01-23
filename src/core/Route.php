<?php
class Route implements RouteInterface {

  const ActionDenominator = '@';
  private $action         = 'execute';
  private static $routes  = [];

  public function __construct($path, $controller) {

    $this->path = $path;

    if (strpos($controller, self::ActionDenominator)) {
      $this->parseActionController($controller);
    } else {
      $this->controllerClass = $controller;
    }
    
  }

  private function parseActionController($controller) {

    list($controllerClass, $action) = explode(self::ActionDenominator, $controller);

    if ($action) {
      $this->action = $action;
    }

    $this->controllerClass = $controllerClass;
  }
 
  public function match(RequestInterface $request) {
    return $this->path === $request->getUri();
  }
 
  public function createController() {
   return new $this->controllerClass;
  }

  public function getAction() {
    return $this->action;
  }

  public static function get($path, $controller=null) {
    self::$routes[] = new Route($path, $controller);
  }

  public static function getAllRoutes() {
    return self::$routes;
  }
}