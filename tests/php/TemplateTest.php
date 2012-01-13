<?php

require_once "PHPUnit/Extensions/Database/TestCase.php";
require_once "src/Template.php";

class TemplateTest extends PHPUnit_Framework_TestCase
{

	public function testHeadJavascript() { 
    	$t = new Template();
    	$js = $t->getHeadJavascript();
    	$this->assertTag(array('tag'=>'script','attributes' => array('comment'=>'Google Analytics')), $js, "include Google Analytics");
    	$this->assertTag(array('tag'=>'script','attributes' => array('src'=>'js/jquery-1.7.1.min.js')), $js, "include minified JQuery");
    	$this->assertTag(array('tag'=>'script','attributes' => array('src'=>'js/jquery.cycle.all.js')), $js, "include jquery.cycle plugin");
    	$this->assertTag(array('tag'=>'script','attributes' => array('src'=>'http://s7.addthis.com/js/250/addthis_widget.js#username=snapweb')), $js, "include Add This widget");
    	$this->assertTag(array('tag'=>'script','attributes' => array('comment'=>'AddThis Configuration')), $js, "include code to configure the Add This widget");
    	$this->assertTag(array('tag'=>'script','attributes' => array('src'=>'js/jquery.blockUI.js')), $js, "include jQuery plugin to block UI during loading");
    	$this->assertTag(array('tag'=>'script','attributes' => array('src'=>'js/jquery.hoverIntent.minified.js')), $js, "include jquery hoverIntent");
    	$this->assertTag(array('tag'=>'script','attributes' => array('src'=>'js/charts.js')), $js,"include objects to manage charts");
    	$this->assertTag(array('tag'=>'script','attributes' => array('src'=>'js/exporting.js')), $js,"include exporter utility (minified)");
    	$this->assertTag(array('tag'=>'script','attributes' => array('src'=>'js/highcharts.js')), $js,"include highcharts");
    	$this->assertTag(array('tag'=>'script','attributes' => array('src'=>'js/plugins.js')), $js,"include jquery Color plugin");
	}

    public function testSubmenu() {
        $t = new Template();
        $html = $t->getSubMenu('about'); // suppose the 'data' menu is chosen
        $this->assertTag(array('tag'=>'div','attributes'=>array('class'=>'submenu')), $html, 'ensure the wrapping submenu div is drawn');
        $this->assertTag(array('tag'=>'a','content'=>'People'), $html, 'ensure About submenu (People, Collaborators, Outreach, F.A.Q. are generated right');
        $this->assertTag(array('tag'=>'a','content'=>'Collaborators'), $html, 'ensure About submenu (People, Collaborators, Outreach, F.A.Q. are generated right');
        $this->assertTag(array('tag'=>'a','content'=>'Outreach'), $html, 'ensure About submenu (People, Collaborators, Outreach, F.A.Q. are generated right');
        $this->assertTag(array('tag'=>'a','content'=>'F.A.Q.'), $html, 'ensure About submenu (People, Collaborators, Outreach, F.A.Q. are generated right');
    }

    public function testStaticSubmenu() {
        $t = new Template();
        $html = $t->getSubMenu('projects'); // suppose the 'projects' menu is chosen
        $this->assertSame('<div class="submenu"><span style="font-size: 13.5px; color: #ffffff;">Learn about all of SNAP&rsquo;s projects below.  The list can be narrowed by selecting from the options below.</span></div>', $html, 'ensure Projects submenu displays a static string, no submenu items');
    }
/*
TODO: restore these two tests.  The second, below, I need to add a custom exception class.

    public function testRefSubmenu() {
        $t = new Template();
        $html = $t->getSubMenu('data'); // suppose the 'projects' menu is chosen
        $this->assertTag(array('tag'=>'a','content'=>'F.A.Q.','attributes'=>array('class'=>'switcher','id'=>'data-faq')), $html, 'ensure Methods submenu is generated with attributes so we can dynamically switch content');
         
    }

    public function testSubmenuException() {
        // This test expects to trigger an exception if it can't match the submenu to its statically-defined list of possible submenus.
        $this->setExpectedException('Exception');
        $t = new Template();
        $html = $t->getSubMenu(); // missing arg, should throw exception
    }
*/

}
?>
