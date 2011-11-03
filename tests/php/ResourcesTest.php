<?php

require_once "PHPUnit/Extensions/Database/TestCase.php";
require_once "src/ResourceLayout.php";
require_once "src/Resource.php";
require_once "tests/fixtures/Fixtures.php";

class ResourcesTest extends PHPUnit_Framework_TestCase
{

    public function testEmptyResultsCountBlock()
    {

        $r = new ResourceLayout();
        $r->setRequests( array( 'tags'=>'xxx', 'collab'=>'xxx', 'type'=>'none') );
        $this->assertEquals('<div id="noResults">There are no results for the criteria you selected.</div>',  $r->getResultsCount(), "User should be notified if no results match.");

    }

    public function testResultsCountBlock()
    {
        $r = new ResourceLayout();
        $r->setRequests( array( 'tags'=>'', 'collab'=>'', 'type'=>'') );
        $r->results = Fixtures::$resources;
        $r->resultsCount = 4; // hardwire!
        $this->assertEquals('<span>Displaying 4 results</span>',  $r->getResultsCount(), "User should see total # of results matched");
    }

    public function testSortCriteriaBlock()
    {
        $r = new ResourceLayout();
        $r->setRequests( array( 'tags'=>'', 'collab'=>'', 'type'=>'') );
        $this->assertEquals('<span id="sortWidget"> Sort by Newest First | <a href="resources.php?&amp;sort=oldest">Oldest First</a></span>',  $r->getSortCriteria(), "Search should default to newest-first");

        $r->setRequests( array( 'tags'=>'', 'collab'=>'', 'type'=>'', 'sort'=>'oldest') );
        $this->assertEquals('<span id="sortWidget"> Sort by <a href="resources.php?">Newest First</a> | Oldest First</span>',  $r->getSortCriteria(), "If user has picked sort-by-oldest, system should show an active link to sort-by-newest");

        $r->setRequests( array( 'tags'=>'climate', 'collab'=>'5', 'type'=>'2', 'sort'=>'oldest') );
        $this->assertEquals('<span id="sortWidget"> Sort by <a href="resources.php?tags=climate&amp;collab=5&amp;type=2">Newest First</a> | Oldest First</span>',  $r->getSortCriteria(), "Search criteria should persist beyond changing sorting order");
    }

    public function testResetFilters()
    {
        $r = new ResourceLayout();
        $r->setRequests( array( 'tags'=>'tags' ));
        $this->assertEquals("<span> | <a href=\"resources.php\">Show All</a></span>", $r->getFilterReset(), "The system should let you reset the filters if you have some selected");
    }

    public function testReportResource()
    {
        $this->markTestSkipped('requires DB + fixtures to run');
        $r = Resource::factory(Fixtures::$resources[1]); 
        $this->assertEquals( Fixtures::$resourceSummaries[1], $r->toSummaryHtml(), "User can see summary block of information about a resource, including a Hover functionality that shows more detail");
    }

    public function testPaperResource()
    {
        $this->markTestSkipped('requires DB + fixtures to run');        
        $r = Resource::factory(Fixtures::$resources[10]);
        $this->assertEquals( Fixtures::$resourceSummaries[10], $r->toSummaryHtml(), "User can see summary block of information about a resource, including a Hover functionality that shows more detail");

    }

    public function testPresentationResource()
    {
        $this->markTestSkipped('requires DB + fixtures to run');
        $r = Resource::factory(Fixtures::$resources[11]); 
        $this->assertEquals( Fixtures::$resourceSummaries[11], $r->toSummaryHtml(), "User can see summary block of information about a resource, including a Hover functionality that shows more detail");
    }

    public function testVideoResource()
    {
        $this->markTestSkipped('requires DB + fixtures to run');
        $r = Resource::factory(Fixtures::$resources[15]); 
        $this->assertEquals( Fixtures::$resourceSummaries[15], $r->toSummaryHtml(), "User can see summary block of information about a resource, including a Hover functionality that shows more detail");
    }

    public function testQueryStringDefault()
    {
        $r = new ResourceLayout();
        $r->setRequests( array( 'tags'=>'', 'collab'=>'', 'type'=>'', 'sort'=>'') );
        $this->assertEquals('SELECT title,type,pubs.id,summary FROM resources pubs LEFT JOIN resource_tags AS pt ON pubs.id=pt.resourceid LEFT JOIN resource_collaborators AS pc ON pubs.id=pc.resourceid  GROUP BY pubs.id ORDER BY pubs.createdate ', $r->getQueryString(), 'Query string should get all resources, sorted from newest to oldest, if there are no specified criteria.');
    }

    public function testOrderQueryString()
    {
        $r = new ResourceLayout();
        $r->setRequests( array( 'tags'=>'', 'collab'=>'', 'type'=>'', 'sort'=>'oldest') );
        $this->assertEquals('SELECT title,type,pubs.id,summary FROM resources pubs LEFT JOIN resource_tags AS pt ON pubs.id=pt.resourceid LEFT JOIN resource_collaborators AS pc ON pubs.id=pc.resourceid  GROUP BY pubs.id ORDER BY pubs.createdate  DESC', $r->getQueryString(), 'Query string should sort oldest first if GET request "sort"="oldest" is present.');
    }

    public function testSubjectQueryString()
    {
        // tags == subject, for this test's purposes
        $r = new ResourceLayout();
        $r->setRequests( array( 'tags'=>'climate', 'collab'=>'', 'type'=>'', 'sort'=>'') );
        $this->assertEquals("SELECT title,type,pubs.id,summary FROM resources pubs LEFT JOIN resource_tags AS pt ON pubs.id=pt.resourceid LEFT JOIN resource_collaborators AS pc ON pubs.id=pc.resourceid  WHERE pt.tag = 'climate' GROUP BY pubs.id ORDER BY pubs.createdate ",  $r->getQueryString(), "Searching by a single tag (=subject)");
    }

    public function testCollabTestQueryString()
    {
        $r = new ResourceLayout();
        $r->setRequests( array( 'tags'=>'', 'collab'=>'5', 'type'=>'2', 'sort'=>'') );
        $this->assertEquals("SELECT title,type,pubs.id,summary FROM resources pubs LEFT JOIN resource_tags AS pt ON pubs.id=pt.resourceid LEFT JOIN resource_collaborators AS pc ON pubs.id=pc.resourceid  WHERE pc.collaboratorid = '5' AND pubs.type = '2' GROUP BY pubs.id ORDER BY pubs.createdate ",  $r->getQueryString(), "Query should dynamically create AND clause if needed to search multiple criteria");
    }    

    public function testFullQueryString()
    {
        $r = new ResourceLayout();
        $r->setRequests( array( 'tags'=>'climate', 'collab'=>'5', 'type'=>'1', 'sort'=>'oldest') );
        $this->assertEquals("SELECT title,type,pubs.id,summary FROM resources pubs LEFT JOIN resource_tags AS pt ON pubs.id=pt.resourceid LEFT JOIN resource_collaborators AS pc ON pubs.id=pc.resourceid  WHERE pt.tag = 'climate' AND pc.collaboratorid = '5' AND pubs.type = '1' GROUP BY pubs.id ORDER BY pubs.createdate  DESC",  $r->getQueryString(), "");
    }

    public function testFetchById()
    {
        $rByFixtures = Resource::factory(Fixtures::$resources[15]);
        $rById = Resource::fetchById(15);
        $this->assertEquals($rByFixtures, $rById, "Resources can be fetched by explicit ID lookup in the database");
    }
}

/**



*/

?>
