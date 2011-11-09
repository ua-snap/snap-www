<?php

require_once "PHPUnit/Extensions/Database/TestCase.php";
require_once "src/Template.php";

class TemplateTest extends PHPUnit_Framework_TestCase
{
	// no-op shim
	public function testHeadJavascript() { 
    	$t = new Template();
    	$js = $t->getHeadJavascript();
    	$this->assertTag(array('tag'=>'script','attributes' => array('comment'=>'Google Analytics')), $js, "include Google Analytics");
    	$this->assertTag(array('tag'=>'script','attributes' => array('src'=>'js/jquery-1.6.4.min.js')), $js, "include minified JQuery");
    //	$this->assertTag(array('tag'=>'script','attributes' => array('src'=>'/js/site.js')), $js);
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
}
?>