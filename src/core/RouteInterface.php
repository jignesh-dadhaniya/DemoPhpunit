<?php
interface RouteInterface {
	
  public function match(RequestInterface $request);
 
  public function createController();
}