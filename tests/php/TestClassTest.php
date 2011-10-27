<?php

require_once("src/TestClass.php");
class TestClassTest extends PHPUnit_Framework_TestCase { 
    public function testDemo() { 
        $x = new TestClass();
        $this->assertEquals(1, $x->demo(1));
    }
}
