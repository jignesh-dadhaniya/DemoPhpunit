<?php
class Dispatcher {

	protected $container = NULL;

	public function __construct($container) {
		$this->container = $container;
	}
	
	public function dispatch($route, $request, $response) {
		$controller = $route->createController();
		$controller->setContainer($this->container);
		$action     = $route->getAction();
		//$controller->action($request, $response);
		call_user_func_array(array($controller, $action), array($request, $response));
	}
}
