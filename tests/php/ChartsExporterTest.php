<?php

require_once 'PHPUnit/Extensions/Database/TestCase.php';
require_once 'src/ChartsExporter.php';
require_once 'tests/fixtures/Fixtures.php';

class ChartsExporterTest extends PHPUnit_Framework_TestCase
{

	public function setUp() {
/*
		$this->exporter = new ChartsExporter();
		$this->exporter->setProps(Fixtures::$chartExport);
          @unlink(Config::$temp . '/SNAP_Chart_Bruce_Alberta_hires.png');
*/
	}

  public function tearDown() {
/*
          @unlink(Config::$temp . '/SNAP_Chart_Bruce_Alberta_hires.png');
*/
  }

    public function testMimeFeatureMap()
    {
  
      $this->markTestSkipped('Skipping until this can be made to run properly on Jenkins server');

  		$c = new ChartsExporter();
  		$this->assertEquals(array(
  			'png/low' => array(
  				'mime' => 'image/png',
  				'command' => 'tbd'	
	  		),
	  		'png/high' => array(
	  			'mime' => 'image/png',
	  			'command' => 'tbd2'
		  	),
		  	'svg' => array(
			  	'mime' => 'image/svg+xml',
			  	'command' => 'tbd3'
			)
	  	), $this->exporter->featureMap, 'test the map between types and export functions');
    }

    public function testThrowsIfMalformedInput() {
    	
$this->markTestSkipped('Skipping until this can be made to run properly on Jenkins server');
      
      try {
  			$this->exporter = new ChartsExporter();
  			
        // Give an empty/unacceptable array
        $this->exporter->setProps(array());

  		} catch (SnapException $e) {
        return; // OK
  		}

      $this->fail('did not trigger an exception based on faulty input to setProps()');
    }

    public function testGetCommunity() {
      $this->markTestSkipped('Skipping until this can be made to run properly on Jenkins server');
      
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }
   

        $c = $this->exporter->getCommunity();
        $this->assertEquals('Bruce', $c['community'], 'test valid fetch of specific community name');
        $this->assertEquals('Alberta', $c['region'], 'test valid fetch of specific community region');

    }

    public function testFilename() {
    	$this->markTestSkipped('Skipping until this can be made to run properly on Jenkins server');
      
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }

        $this->assertEquals('SNAP_Chart_Bruce_Alberta_hires.png', $this->exporter->getFilename(), 'test generation of file name');

        $this->exporter->type = 'png/low';
        $this->assertEquals('SNAP_Chart_Bruce_Alberta_lowres.png', $this->exporter->getFilename(), 'test generation of file name');

        $this->exporter->type = 'svg';
        $this->assertEquals('SNAP_Chart_Bruce_Alberta.svg', $this->exporter->getFilename(), 'test generation of file name');
    }

    public function testWriteFile() {
  $this->markTestSkipped('Skipping until this can be made to run properly on Jenkins server');
      
      $this->exporter->writeFileToCache('SNAP_Chart_Bruce_Alberta_hires.png');
      $this->assertTrue(file_exists(Config::$charts.'SNAP_Chart_Bruce_Alberta_hires.png'), 'ensure file is written correctly');
  
    }

    public function testFetchFromCache() {
$this->markTestSkipped('Skipping until this can be made to run properly on Jenkins server');
      
      touch(Config::$temp . '/SNAP_Chart_Bruce_Alberta_hires.png');
      $this->assertTrue($this->exporter->fileExistsInCache('SNAP_Chart_Bruce_Alberta_hires.png'), 'ensure exporter checks cache before generating new files');    	
    }

}
?>
