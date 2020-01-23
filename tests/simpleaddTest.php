<?php
use PHPUnit\Framework\TestCase;

class testsimpleadd extends TestCase {

    private function _execute(array $params = array()) {
        $_GET = $params;
        include 'simple_add.php';
    }

    public function testNoArgFirst() {
	$args = array('arg1'=>30);
        
	try {
		$this->_execute($args);
	} catch(Exception $e) {
		$this->assertEquals("arg2 not found", $e->getMessage());
	}	

    }

    public function testNoArgSecond() {
	$args = array('arg2'=>30);
	
	try {
		$this->_execute($args);
	} catch(Exception $e) {
		$this->assertEquals("arg1 not found", $e->getMessage());
	}	
	
    }

    public function testSomething() {

	global $return;
        $args = array('arg1'=>30, 'arg2'=>12);
	$val = $this->_execute($args);

        $this->assertEquals(42, add(30,12)); // passes
    }

}
