<?php
abstract class BaseController {

	public function __construct(RouterInterface $router, $dispatcher) {
        $this->router = $router;
        $this->dispatcher = $dispatcher;
    }
}