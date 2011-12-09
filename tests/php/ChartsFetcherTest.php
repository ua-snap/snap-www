<?php

require_once 'src/ChartsFetcher.php';
require_once "PHPUnit/Extensions/Database/TestCase.php";

class ChartsFetcherTest extends PHPUnit_Framework_TestCase
{

	public function testFetchByTemperature()
	{
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }

		$d = new ChartsFetcher('Fairbanks');
		$t = $d->byTemperature();
		$this->assertEquals( $t['max(value)'], 69 );
		$this->assertEquals( $t['min(value)'], -9 );
	}

	public function testFetchByPrecipitation()
	{
		if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }

		$d = new ChartsFetcher('Fairbanks');
		$t = $d->byPrecipitation();
		$this->assertEquals( $t['max(value)'], 3 );
		$this->assertEquals( $t['min(value)'], 0 );

	}

	public function testFetchByProjection()
	{
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }

		$d = new ChartsFetcher('Fairbanks', 1, 'A2', '2001-2010');
		$t = $d->fetch();
		$this->assertEquals( $t[0]['month'], 'Jan' );
		$this->assertEquals( $t[0]['daterange'], '2001-2010' );
		$this->assertEquals( $t[0]['value'], -5 );
		$this->assertEquals( $t[0]['stddev'], 6 );
		$this->assertEquals( $t[0]['type'], 1 );
		$this->assertEquals( $t[0]['scenario'], 'A2' );

	}

	public function testFetchName() {
        
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }
		
		$d = new ChartsFetcher('aki');
		$t = $d->byName();
		$this->assertEquals( $t[0]['community'], 'Akiachak' );
		$this->assertEquals( $t[1]['community'], 'Akiak' );
	
	}

	public function testFetchCommunities() {
        
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }
		// Weak.  But.  :)
		$c = ChartsFetcher::getCommunities();
		$this->assertEquals( $c[0]['community'], 'Adak Station' );

	}
}

?>