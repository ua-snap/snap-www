<?php

require_once 'src/ChartsFetcher.php';
require_once "PHPUnit/Extensions/Database/TestCase.php";

class ChartsFetcherTest extends PHPUnit_Framework_TestCase
{

	public function testFetchCommunitiesAsJson()
	{
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }	
		
		$j = ChartsFetcher::fetchCommunitiesAsJson();
		$this->assertNotNull($j); // don't want to test the structure of the json yet, just a basic sanity check
		
	}

	public function testFetchTemperatureChart() {

		if( Config::$testing['skipDatabase']) {
			$this->markTestSkipped("No database connection, skipping...");
		}

		$chart = json_decode(ChartsFetcher::fetchChart(167, 1, 'A1B', 0), true); // decode as an array
		$this->assertArrayHasKey('series', $chart);
		$this->assertArrayHasKey('1961-1990', $chart['series']);
		$this->assertArrayHasKey('2001-2010', $chart['series']);
		$this->assertArrayHasKey('2031-2040', $chart['series']);
		$this->assertArrayHasKey('2061-2070', $chart['series']);
		$this->assertArrayHasKey('2091-2100', $chart['series']);
		$this->assertEquals( $chart['yAxisTitle'], "Temperature &deg;F");

		// some test for the presence of the plotThing? $this->assertEquals( );

		$this->assertEquals( $chart['subtitle'], "5 Model Average, Mid-range emissions (A1B)" );
		$this->assertEquals( $chart['title'], "Historical and Projected Average Monthly Temperature for Fairbanks");
		$this->assertEquals( $chart['communityId'], 167);
		$this->assertEquals( $chart['communityName'], 'Fairbanks');
		$this->assertEquals( $chart['scenario'], 'A1B');
		$this->assertEquals( $chart['dataset'], 1);
		$this->assertEquals( $chart['variability'], 0);

	}
	
	public function testFetchPrecipitationChart() {

		if( Config::$testing['skipDatabase']) {
			$this->markTestSkipped("No database connection, skipping...");
		}

		$chart = json_decode(ChartsFetcher::fetchChart(167, 2, 'B1', 0), true); // decode as an array
		$this->assertArrayHasKey('series', $chart);
		$this->assertArrayHasKey('1961-1990', $chart['series']);
		$this->assertArrayHasKey('2001-2010', $chart['series']);
		$this->assertArrayHasKey('2031-2040', $chart['series']);
		$this->assertArrayHasKey('2061-2070', $chart['series']);
		$this->assertArrayHasKey('2091-2100', $chart['series']);
		$this->assertEquals( $chart['yAxisTitle'], "Total precipitation in inches");

		// test for absence of plotBands function

		$this->assertEquals( $chart['subtitle'], "5 Model Average, Low-range emissions (B1)" );
		$this->assertEquals( $chart['title'], "Historical and Projected Average Monthly Precipitation for Fairbanks");
		$this->assertEquals( $chart['communityId'], 167);
		$this->assertEquals( $chart['communityName'], 'Fairbanks');
		$this->assertEquals( $chart['scenario'], 'B1');
		$this->assertEquals( $chart['dataset'], 2);
		$this->assertEquals( $chart['variability'], 0);

	}
}

?>