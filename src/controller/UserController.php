<?php
class UserController extends AbstractController {

	public function index($request, $response) {
		echo "Index Action 3 BHK Flat for sale Id ".$request->getParameter('id')." Name ".$request->getParameter('name');

		header("Content-type:text/html");
	}

	public function execute($request, $response) {
		echo "3 BHK Flat for sale Ids ".$request->getParameter('id')." Name ".$request->getParameter('name');

		//header("Content-type:text/html");
		//$response->addHeader("Content-type: text/xml");
		return $response->send();
	}
}
?>
