<?php

class HomeController extends AbstractController {
	
	public function index($request, $response) {

		echo "Hello Welcome!";

		var_dump($this->getContainer()->getService('TemplateService')->render('home/index'));
	}
}