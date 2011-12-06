<?php

require_once "PHPUnit/Extensions/Database/TestCase.php";
require_once "src/ProjectResourceLink.php";

class ProjectResourceLinkTest extends PHPUnit_Framework_TestCase
{
    public function testGetLinksByResource()
    {

        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }      
        $r = new ProjectResourceLink();
        $links = $r->getLinksByResource(1);
        $this->assertEquals($links[0]['id'], 1);
        $this->assertEquals($links[0]['title'], 'North Slope Climate Analysis');
        $this->assertEquals($links[1]['title'], 'Sitka Hydropower');
        $this->assertEquals($links[1]['id'], 2);

    }

    public function testGetHtmlByResource()
    {
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }      
        $r = new ProjectResourceLink();
        $html = $r->getHtmlByResource(1);
        $this->assertTag(array('tag'=>'div','attributes'=>array('id'=>'projectLinks')), $html, 'ensure div wrapper present');
        $this->assertTag(array('tag'=>'h4','content'=>'Related projects'), $html, 'ensure header element present');
        $this->assertTag(array('tag'=>'a','content'=>'North Slope Climate Analysis','attributes'=>array('href'=>'project_page.php?projectid=1')), $html, 'validate 1st link to project');
        $this->assertTag(array('tag'=>'a','content'=>'Sitka Hydropower','attributes'=>array('href'=>'project_page.php?projectid=2')), $html, 'validate 2nd link to project');

    }

    public function testGetLinksByProject()
    {

        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }
        $r = new ProjectResourceLink();
        $links = $r->getLinksByProject(2);
        $this->assertEquals($links[0]['id'], 1);
        $this->assertEquals($links[0]['title'], 'Sensitivity of Simulated Boreal Fire Dynamics to Uncertainties in Climate Drivers');
        $this->assertEquals($links[1]['title'], 'Global Climate Model Performance over Alaska and Greenland');
        $this->assertEquals($links[1]['id'], 2);
     
    }

    public function testGetHtmlByProject()
    {
        if( Config::$testing['skipDatabase'] ) {
            $this->markTestSkipped("No database connection, skipping...");
        }      
        $r = new ProjectResourceLink();
        $html = $r->getHtmlByProject(2);
        $this->assertTag(array('tag'=>'div','attributes'=>array('id'=>'resourceLinks')), $html, 'ensure div wrapper present');
        $this->assertTag(array('tag'=>'h4','content'=>'Related resources'), $html, 'ensure header element present');
        $this->assertTag(array('tag'=>'a','content'=>'Sensitivity of Simulated Boreal Fire Dynamics to Uncertainties in Climate Drivers','attributes'=>array('href'=>'resource_page.php?resourceid=1')), $html, 'validate 1st link to resource');
        $this->assertTag(array('tag'=>'a','content'=>'Global Climate Model Performance over Alaska and Greenland','attributes'=>array('href'=>'resource_page.php?resourceid=2')), $html, 'validate 2nd link to resource');
 
    }
}

/*

<div id="projectLinks"><h4>Related projects</h4><ul><li><a href="project_page?projectid=1">North Slope Climate Analysis</a></li><li><a href="project_page?projectid=2">Sitka Hydropower</a></li></ul></div>

project_page?projectid=1
project_page.php?projectid=1
*/
?>