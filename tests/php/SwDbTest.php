<?php

require_once('src/Config.php');
require_once('src/SwDb.php');
require_once "PHPUnit/Extensions/Database/TestCase.php";


class SwDbTest extends PHPUnit_Framework_TestCase
{

	public function testGetDbInstance() {
        $this->markTestSkipped('requires DB driver+instance to run');
		$d = swDb::getInstance();
		$this->assertInstanceOf('PDO', $d);
	}


}

?>