<?php

if (!isset($_GET['arg1'])) {
    throw new Exception('arg1 not found');
}

if (!isset($_GET['arg2'])) {
    throw new Exception('arg2 not found');
}

$arg1 = $_GET['arg1'];
$arg2 = isset($_GET['arg2']) ? $_GET['arg2'] : '2';

if (!function_exists('add'))   {
	function add($arg1, $arg2) {
		return $arg1 + $arg2;
	}
}

add($arg1, $arg2);
