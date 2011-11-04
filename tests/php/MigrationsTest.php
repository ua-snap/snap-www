<?php

require_once "PHPUnit/Extensions/Database/TestCase.php";
require_once "src/Migrations.php";

class MigrationsTest extends PHPUnit_Framework_TestCase
{

    public function testMigrateUp()
    {
    	$m = new Migration(
	    	array(
	    		'version' => 1,
		    	'up' => "SELECT 'up'",
		    	'fixtures' => "SELECT 'fixtures'",
		    	'down' => "SELECT 'down'"
		    )
		);
		$this->assertEquals(array('up'=>'00000', 'fixtures'=>'00000'), $m->up(), "Running a migration->up() returns the SQL result from running the up and fixtures scripts");
		$this->assertEquals("SELECT 'up'SELECT 'fixtures'", str_replace("\n",'',$m->sql), "The migration logs the SQL it ran");
    }

	public function testMigrateDown()
    {
    	$m = new Migration(
	    	array(
	    		'version' => 1,
		    	'up' => "SELECT 'up'",
		    	'fixtures' => "SELECT 'fixtures'",
		    	'down' => "SELECT 'down'"
		    )
		);
		$this->assertEquals(array('down' => '00000'), $m->down(), "Running a migration->down() returns the SQL result from running the down() script");
		$this->assertEquals("SELECT 'down'", str_replace("\n",'',$m->sql), "The migration logs the SQL it ran");
    }
}

?>