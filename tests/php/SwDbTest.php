<?php

require_once('src/Config.php');
require_once('src/SwDb.php');
require_once "PHPUnit/Extensions/Database/TestCase.php";


class SwDbTest extends PHPUnit_Framework_TestCase
{

    public function testGetDbInstance() {
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }
        $d = SwDb::getInstance();
        $this->assertInstanceOf('PDO', $d);
    }

    public function testGetDbSchemaVersion() {
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }   
        $this->assertGreaterThanOrEqual( 0, SwDb::getSchemaVersion() );
    }
}

?>
