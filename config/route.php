<?php
// $route1  = new Route("/", "HomeController@index");
// $route2  = new Route("/user/index", "UserController@index");
// $route3  = new Route("/error", "ErrorController");

Route::get("/", "HomeController@index");
Route::get("/user/index", "UserController@index");
Route::get("/error", "ErrorController");

$router  = new Router(Route::getAllRoutes());