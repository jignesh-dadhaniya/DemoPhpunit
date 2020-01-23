<?php

abstract class AbstractController {
	/**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @internal
     * @required
     */
    public function setContainer(ContainerInterface $container)
    {
        $previous = $this->container;
        $this->container = $container;

        return $previous;
    }

    public function getContainer() {
    	return $this->container;
    }
}