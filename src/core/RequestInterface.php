<?php

interface RequestInterface {
	
	public function getUri();

	public function getParameter($key);
}