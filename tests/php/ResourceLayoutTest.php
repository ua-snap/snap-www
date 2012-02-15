<?php

require_once "PHPUnit/Extensions/Database/TestCase.php";
require_once "src/ResourceLayout.php";

class ResourceLayoutTest extends PHPUnit_Framework_TestCase
{

    public function testResourceCategories() {
    
        $this->assertEquals(ResourceLayout::$categories, array(2=>'Reports', 1=>'Fact Sheets', 3=>'Presentations', 4=>'Videos'));

    }

    public function testGetResources()
    {

        $r = new ResourceLayout();
        $r->results = array(
            array(
                'title' => 'Some Whitepaper',
                'type' => 1,
                'id' => 1,
                'summary' => 'Whitepaper Summary'
            ),
            array(
                'title' => 'Some FactSheet',
                'type' => 2,
                'id' => 2,
                'summary' => 'FactSheet Summary'
            ),
            array(
                'title' => 'Some Presentation',
                'type' => 1,
                'id' => 1,
                'summary' => 'Presentation Summary'
            ),
            array(
                'title' => 'Some Video',
                'type' => 1,
                'id' => 1,
                'summary' => 'Video Summary'
            ),
        );
        $html = $r->getResourcesHtml();

        $this->assertTag(array('tag'=>'div','attributes'=>array('class'=>'resources')), $html, 'verify resources wrapper div');
        $this->assertTag(array('tag'=>'h3','content'=>'Fact Sheets','child'=>array('tag'=>'img', 'attributes'=>array('src'=>'images/pub_paper.png'))), $html, 'verify header & image for Fact Sheet');
        $this->assertTag(array('tag'=>'h3','content'=>'Reports','child'=>array('tag'=>'img', 'attributes'=>array('src'=>'images/pub_report.png'))), $html, 'verify header & image for Reports');
        $this->assertTag(array('tag'=>'h3','content'=>'Presentations','child'=>array('tag'=>'img', 'attributes'=>array('src'=>'images/pub_presentation.png'))), $html, 'verify header & image for Presentations');
        $this->assertTag(array('tag'=>'h3','content'=>'Videos','child'=>array('tag'=>'img', 'attributes'=>array('src'=>'images/pub_video.png'))), $html, 'verify header for & image Presentations');        

    }


    public function testGetSpecificResources()
    {

        $r = new ResourceLayout();
        $r->results = array(
            array(
                'title' => 'Some Whitepaper',
                'type' => 1,
                'id' => 1,
                'summary' => 'Whitepaper Summary'
            ),
            array(
                'title' => 'Some FactSheet',
                'type' => 2,
                'id' => 2,
                'summary' => 'FactSheet Summary'
            ),
            array(
                'title' => 'Some Presentation',
                'type' => 1,
                'id' => 1,
                'summary' => 'Presentation Summary'
            ),
            array(
                'title' => 'Some Video',
                'type' => 1,
                'id' => 1,
                'summary' => 'Video Summary'
            ),
        );
        $html = $r->getResourcesHtml(array(1=>'Fact Sheets',2=>'Reports'));

        $this->assertTag(array('tag'=>'div','attributes'=>array('class'=>'resources')), $html, 'verify resources wrapper div');
        $this->assertTag(array('tag'=>'h3','content'=>'Fact Sheets'), $html, 'verify header for Fact Sheet');
        $this->assertTag(array('tag'=>'h3','content'=>'Reports'), $html, 'verify header for Reports');
        $this->assertNotTag(array('tag'=>'h3','content'=>'Presentations'), $html, 'verify NO header for Presentations');
        $this->assertNotTag(array('tag'=>'h3','content'=>'Videos'), $html, 'verify NO header for Presentations');        

    }

}

?>