<?php
interface RouterInterface {
	
	public function addRoute(RouteInterface $route);

	public function route(RequestInterface $request, $response);
}