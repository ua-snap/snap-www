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

// just test for a json decode success
		$this->assertNotNull(
			json_decode(
				ChartsFetcher::fetchChart(167, 1, 'A1B', 0)
				, true
			)
		);
	}

	public function testFetchPrecipitationChart() {

		if( Config::$testing['skipDatabase']) {
			$this->markTestSkipped("No database connection, skipping...");
		}

// just test for a json decode success
		$this->assertNotNull(
			json_decode(
				ChartsFetcher::fetchChart(167, 1, 'A1B', 0)
				, true
			)
		);
	}
}

?>