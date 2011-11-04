<?php

require_once "PHPUnit/Extensions/Database/TestCase.php";
require_once "src/Migrations.php";

class MigrationSuiteTest extends PHPUnit_Framework_TestCase
{

    public function testMigrateUp()
    {
    	$ms = new MigrationSuite();
    	$m = new Migration(
	    	array(
	    		'version' => 1,
		    	'up' => "SELECT 'up'",
		    	'fixtures' => "SELECT 'fixtures'",
		    	'down' => "SELECT 'down'"
		    )
		);
	  	$m1 = new Migration(
	    	array(
	    		'version' => 2,
		    	'up' => "SELECT 'up1'",
		    	'fixtures' => "SELECT 'fixtures1'",
		    	'down' => "SELECT 'down1'"
		    )
		);
		$ms->add($m);
		$ms->add($m1);
		$this->assertEquals(2, $ms->up(), "Migration Suite->Up runs up+fixtures for each migration, returns the final level of the migration");
		$this->assertEquals(array( 0=> array('up'=>'00000','fixtures'=>'00000', 'version'=>1), 1=>array('up'=>'00000', 'fixtures'=>'00000', 'version'=>2)), $ms->log(), "Migration suite logs result responses from each up+fixtures run");
    }

    public function testMigrateDown()
    {
    	$ms = new MigrationSuite();
    	$m = new Migration(
	    	array(
	    		'version' => 1,
		    	'up' => "SELECT 'up'",
		    	'fixtures' => "SELECT 'fixtures'",
		    	'down' => "SELECT 'down'"
		    )
		);
	  	$m1 = new Migration(
	    	array(
	    		'version' => 2,
		    	'up' => "SELECT 'up1'",
		    	'fixtures' => "SELECT 'fixtures1'",
		    	'down' => "SELECT 'down1'"
		    )
		);
		$ms->add($m);
		$ms->add($m1);
		$ms->at(2);
		$this->assertEquals(1, $ms->down(), "Migration Suite->Down runs down for each migration unless specified, only going down ONE level by default, returns the final level of the migration");
		$this->assertEquals(array( 0=>array('down'=>'00000', 'version'=>2) ), $ms->log(), "Migration suite logs result responses from each up+fixtures run, in the correct order (big > small)");
    }

    public function testMigrateUpRanged()
    {
    	$ms = new MigrationSuite();
    	$m = new Migration(
	    	array(
	    		'version' => 1,
		    	'up' => "SELECT 'up'",
		    	'fixtures' => "SELECT 'fixtures'",
		    	'down' => "SELECT 'down'"
		    )
		);
	  	$m1 = new Migration(
	    	array(
	    		'version' => 2,
		    	'up' => "SELECT 'up1'",
		    	'fixtures' => "SELECT 'fixtures1'",
		    	'down' => "SELECT 'down1'"
		    )
		);
		$m2 = new Migration(
	    	array(
	    		'version' => 3,
		    	'up' => "SELECT 'up2'",
		    	'fixtures' => "SELECT 'fixtures2'",
		    	'down' => "SELECT 'down2'"
		    )
		);
		$m3 = new Migration(
	    	array(
	    		'version' => 4,
		    	'up' => "SELECT 'up3'",
		    	'fixtures' => "SELECT 'fixtures3'",
		    	'down' => "SELECT 'down3'"
		    )
		);
		$ms->add($m);
		$ms->add($m1);
		$ms->add($m2);
		$ms->add($m3);
		$this->assertEquals(0, $ms->at(), "Migration suite defaults to being at level 0");
		$ms->at(2);
		$this->assertEquals(4, $ms->up(), "Migration Suite->Up runs up+fixtures for each migration, starting at the current At+1, returns the final level of the migration");
		$this->assertEquals(array( 0 => array('up'=>'00000','fixtures'=>'00000', 'version'=>'3'), 1=>array('up'=>'00000', 'fixtures'=>'00000', 'version'=>'4')), $ms->log(), "Migration suite logs result responses from each up+fixtures run");
		$this->assertEquals("SELECT 'up2'SELECT 'fixtures2'SELECT 'up3'SELECT 'fixtures3'", str_replace("\n",'',$ms->sql), "All SQL during execution is logged");
    }

    public function testMigrateDownRanged()
    {
    	$ms = new MigrationSuite();
    	$m = new Migration(
	    	array(
	    		'version' => 1,
		    	'up' => "SELECT 'up'",
		    	'fixtures' => "SELECT 'fixtures'",
		    	'down' => "SELECT 'down'"
		    )
		);
	  	$m1 = new Migration(
	    	array(
	    		'version' => 2,
		    	'up' => "SELECT 'up1'",
		    	'fixtures' => "SELECT 'fixtures1'",
		    	'down' => "SELECT 'down1'"
		    )
		);
		$m2 = new Migration(
	    	array(
	    		'version' => 3,
		    	'up' => "SELECT 'up2'",
		    	'fixtures' => "SELECT 'fixtures2'",
		    	'down' => "SELECT 'down2'"
		    )
		);
		$m3 = new Migration(
	    	array(
	    		'version' => 4,
		    	'up' => "SELECT 'up3'",
		    	'fixtures' => "SELECT 'fixtures3'",
		    	'down' => "SELECT 'down3'"
		    )
		);
		$ms->add($m);
		$ms->add($m1);
		$ms->add($m2);
		$ms->add($m3);
		$ms->at(4);
		$this->assertEquals(2, $ms->down(2), "Migration Suite->Down runs down for each migration, starting at the current At+1, returns the final level of the migration");
		$this->assertEquals(array( 0=> array('down'=>'00000','version'=>4), 1=> array('down'=>'00000','version'=>3)), $ms->log(), "Migration suite logs result responses from each down run");
		$this->assertEquals("SELECT 'down3'SELECT 'down2'", str_replace("\n",'',$ms->sql), "All SQL during execution is logged");

    }
}

?>