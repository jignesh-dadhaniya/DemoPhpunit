<?php

class Container implements ContainerInterface {
	
	public function getService($service) {
		
		$class = ucfirst($service);

		if (class_exists($class)) {
			$obj = new $class;

			return $obj;
		}

		return NULL;
	}
}