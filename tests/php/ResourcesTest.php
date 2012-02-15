<?php

require_once "PHPUnit/Extensions/Database/TestCase.php";
require_once "src/Resource.php";
require_once "tests/fixtures/Fixtures.php";

class ResourcesTest extends PHPUnit_Framework_TestCase
{

    public function testReportResource()
    {
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }
        $r = Resource::factory(Fixtures::$resources[1]); 
        $this->assertEquals( Fixtures::$resourceSummaries[1], $r->toSummaryHtml(), "User can see summary block of information about a resource, including a Hover functionality that shows more detail");
    }

    public function testPaperResource()
    {
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }        
        $r = Resource::factory(Fixtures::$resources[10]);
        $this->assertEquals( Fixtures::$resourceSummaries[10], $r->toSummaryHtml(), "User can see summary block of information about a resource, including a Hover functionality that shows more detail");

    }

    public function testPresentationResource()
    {
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }
        $r = Resource::factory(Fixtures::$resources[11]); 
        $this->assertEquals( Fixtures::$resourceSummaries[11], $r->toSummaryHtml(), "User can see summary block of information about a resource, including a Hover functionality that shows more detail");
    }

    public function testVideoResource()
    {
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }
        $r = Resource::factory(Fixtures::$resources[15]); 
        $this->assertEquals( Fixtures::$resourceSummaries[15], $r->toSummaryHtml(), "User can see summary block of information about a resource, including a Hover functionality that shows more detail");
    }

    public function testFetchById()
    {
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }        
        $rById = Resource::fetchById(15);
        // Trivial test here, just to ensure the fetch/create cycle works
        $this->assertEquals($rById->props['id'], 15, "Resources can be fetched by explicit ID lookup in the database");
    }

}
?>
