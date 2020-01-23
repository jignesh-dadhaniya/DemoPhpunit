<?php
class Request implements RequestInterface {

	protected $uri;
	protected $params = [];
	
	public function __construct($uri, $params=[]) {
		
		$this->params = $params;
		$this->extractUriAndParams($uri);
	}

	public static function createFromGlobals() {

		$uri = $_SERVER['REQUEST_URI'];
		return new self($uri);
	}

	private function extractUriAndParams($uri) {
		$parts = explode('?', $uri);

		if (isset($parts[0])) {
			$this->uri = $parts[0];
		}

		if (isset($parts[1])) {

			$queryString = $parts[1];
			$this->addParamsByQueryString($queryString);
		}
	}

	private function addParamsByQueryString($queryString) {
		if ($queryString) {
			parse_str($queryString, $params);

			if ($params) {
				$this->params = $this->params + $params;
			}
		}
	}

	private function addParam($param) {
		$this->params[] = $param;
	}

	private function setParam($key, $value) {
		$this->params[$key] = $value;

		return $this;
	}

	private function getParams() {
		return $this->params;
	}

	public function getUri() {
		return $this->uri;
	}

	public function getParameter($key) {

		if (isset($this->params[$key])) {
	        return $this->params[$key];
	    }

	    return null;
		
	}

}