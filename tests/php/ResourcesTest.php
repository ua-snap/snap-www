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
        $this->assertEquals( $r->getResultsCount(), '<div style="font-size: 16px;">There are no results for the criteria you selected.</div>');

    }

    public function testResultsCountBlock()
    {
        $r = new ResourceLayout();
        $r->setRequests( array( 'tags'=>'', 'collab'=>'', 'type'=>'') );
        $this->assertEquals( $r->getResultsCount(), '<span>Displaying 15 results</span>');
    }

    public function testSortCriteriaBlock()
    {
    	$r = new ResourceLayout();
        $r->setRequests( array( 'tags'=>'', 'collab'=>'', 'type'=>'') );
        $this->assertEquals( $r->getSortCriteria(), '<div><span style="margin-left: 50px;"> Sort by Newest First | <a href="/resources.php?sort=oldest">Oldest First</a></span></div>');
        $r->setRequests( array( 'tags'=>'', 'collab'=>'', 'type'=>'', 'sort'=>'oldest') );
        $this->assertEquals( $r->getSortCriteria(), '<span style="margin-left: 50px;"> Sort by <a href="/resources.php?">Newest First</a> | Oldest First</span>');
	    
    }

    public function testReportResource()
    {
    	$r = Resource::factory(Fixtures::$resources[1]); // ID 1 in DB must be a report resource
    	$this->assertEquals( $r->toSummaryHtml(), <<<html
<div id="pub_box_10" style="width: 440px; height: 50px; display: inline-block; margin: 10px; margin-bottom: 10px; position: relative; "><div id="pub_hover_10" class="hover_box" ><div style="position: relative; "><div style="position: absolute; "><img alt="pub_report.png" src="images/pub_report.png" style="margin-left: 5px;" /></div><div style="position: relative;; left: 59px; width: 380px; ;"><div style="font-size: 15px; color: #111111; margin-top: 5px; margin-bottom: 5px;" ><a href="resource_page.php?resourceid=10">Reports for Boreal ALFRESCO</a></div><div style="position: relative; width: 420px; margin-bottom: 10px;"></div><div style="color: #666666;">Tags: ecological model</div></div></div><div style="margin-top: 10px;width: 420px; padding: 10px;">As Boreal ALFRESCO finishes modeling specific areas in Alaska, reports will be posted here to download. These reports focus on particular domains within the state and present maps, data, and other interpretations of model output. </div><div style="position: relative; left: 385px; bottom: 5px; margin-top: 10px;"><a id="pub_close_10" style="cursor: pointer; cursor: hand;">close &#8855;</a></div></div>
<div style="width: 50px; padding: 6px; position: absolute; z-index: 1;"><img alt="pub_report.png" src="images/pub_report.png" style="" /></div><div style="position: absolute; padding-top: 6px; left: 60px; width: 380px;"><div style="font-size: 15px; color: #111111; margin-bottom: 5px;" ><a href="resource_page.php?resourceid=10">Reports for Boreal ALFRESCO</a></div></div><script type="text/javascript">
var config = { 
					over: function(){ $('#pub_hover_10').fadeIn(300); },
					interval: 100,
					out: function(){ $('#pub_hover_10').hide(0); } 
					};$('#pub_box_10').hoverIntent(config);$('#pub_close_10').click(
					function(){ $('#pub_hover_10').hide(0); }
				);</script>
</div>
html
);
    }

    public function testPaperResource()
    {
    	$r = Resource::factory(Fixtures::$resources[10]); // ID 10 in DB must be a paper resource
    	$this->assertEquals( $r->toSummaryHtml(), <<<html
<div id="pub_box_10" style="width: 440px; height: 50px; display: inline-block; margin: 10px; margin-bottom: 10px; position: relative; "><div id="pub_hover_10" class="hover_box" ><div style="position: relative; "><div style="position: absolute; "><img alt="pub_report.png" src="images/pub_report.png" style="margin-left: 5px;" /></div><div style="position: relative;; left: 59px; width: 380px; ;"><div style="font-size: 15px; color: #111111; margin-top: 5px; margin-bottom: 5px;" ><a href="resource_page.php?resourceid=10">Reports for Boreal ALFRESCO</a></div><div style="position: relative; width: 420px; margin-bottom: 10px;"></div><div style="color: #666666;">Tags: ecological model</div></div></div><div style="margin-top: 10px;width: 420px; padding: 10px;">As Boreal ALFRESCO finishes modeling specific areas in Alaska, reports will be posted here to download. These reports focus on particular domains within the state and present maps, data, and other interpretations of model output. </div><div style="position: relative; left: 385px; bottom: 5px; margin-top: 10px;"><a id="pub_close_10" style="cursor: pointer; cursor: hand;">close &#8855;</a></div></div>
<div style="width: 50px; padding: 6px; position: absolute; z-index: 1;"><img alt="pub_report.png" src="images/pub_report.png" style="" /></div><div style="position: absolute; padding-top: 6px; left: 60px; width: 380px;"><div style="font-size: 15px; color: #111111; margin-bottom: 5px;" ><a href="resource_page.php?resourceid=10">Reports for Boreal ALFRESCO</a></div></div><script type="text/javascript">
var config = { 
					over: function(){ $('#pub_hover_10').fadeIn(300); },
					interval: 100,
					out: function(){ $('#pub_hover_10').hide(0); } 
					};$('#pub_box_10').hoverIntent(config);$('#pub_close_10').click(
					function(){ $('#pub_hover_10').hide(0); }
				);</script>
</div>
html
);
    }

    public function testPresentationResource()
    {
    	$r = Resource::factory(Fixtures::$resources[11]); // Id 11 in DB must be a presentation resource
    	$this->assertEquals( $r->toSummaryHtml(), <<<html
<div id="pub_box_12" style="width: 440px; height: 50px; display: inline-block; margin: 10px; margin-bottom: 10px; position: relative; "><div id="pub_hover_12" class="hover_box" ><div style="position: relative; "><div style="position: absolute; "><img alt="pub_presentation.png" src="images/pub_presentation.png" style="margin-left: 5px;" /></div><div style="position: relative;; left: 59px; width: 380px; ;"><div style="font-size: 15px; color: #111111; margin-top: 5px; margin-bottom: 5px;" ><a href="resource_page.php?resourceid=12">SNAP climate map animations and descriptions</a></div><div style="position: relative; width: 420px; margin-bottom: 10px;"></div><div style="color: #666666;">Tags: climate, SNAP</div></div></div><div style="margin-top: 10px;width: 420px; padding: 10px;">This PowerPoint animation was originally presented in a large-screen format at the SNAP information booth at the Alaska Forum on the Environment, January 2009. It was intended to offer a visual depiction of some of SNAP&#039;s map products to interested members of the public.</div><div style="position: relative; left: 385px; bottom: 5px; margin-top: 10px;"><a id="pub_close_12" style="cursor: pointer; cursor: hand;">close &#8855;</a></div></div>
<div style="width: 50px; padding: 6px; position: absolute; z-index: 1;"><img alt="pub_presentation.png" src="images/pub_presentation.png" style="" /></div><div style="position: absolute; padding-top: 6px; left: 60px; width: 380px;"><div style="font-size: 15px; color: #111111; margin-bottom: 5px;" ><a href="resource_page.php?resourceid=12">SNAP climate map animations and descriptions</a></div></div><script type="text/javascript">
var config = { 
					over: function(){ $('#pub_hover_12').fadeIn(300); },
					interval: 100,
					out: function(){ $('#pub_hover_12').hide(0); } 
					};$('#pub_box_12').hoverIntent(config);$('#pub_close_12').click(
					function(){ $('#pub_hover_12').hide(0); }
				);</script>
</div>
html
);
    }

    public function testVideoResource()
    {
    	$r = Resource::factory(Fixtures::$resources[15]); // Id 15 in DB must be a video resource
    	$this->assertEquals( $r->toSummaryHtml(), <<<html
<div id="pub_box_15" style="width: 440px; height: 50px; display: inline-block; margin: 10px; margin-bottom: 10px; position: relative; "><div id="pub_hover_15" class="hover_box" ><div style="position: relative; "><div style="position: absolute; "><img alt="pub_video.png" src="images/pub_video.png" style="margin-left: 5px;" /></div><div style="position: relative;; left: 59px; width: 380px; ;"><div style="font-size: 15px; color: #111111; margin-top: 5px; margin-bottom: 5px;" ><a href="resource_page.php?resourceid=15">Introduction to SNAP</a></div><div style="position: relative; width: 420px; margin-bottom: 10px;"></div><div style="color: #666666;">Tags: </div></div></div><div style="margin-top: 10px;width: 420px; padding: 10px;">Dr. Scott Rupp introduces the Scenarios Network for Alaska &amp; Arctic Planning in this short video</div><div style="position: relative; left: 385px; bottom: 5px; margin-top: 10px;"><a id="pub_close_15" style="cursor: pointer; cursor: hand;">close &#8855;</a></div></div>
<div style="width: 50px; padding: 6px; position: absolute; z-index: 1;"><img alt="pub_video.png" src="images/pub_video.png" style="" /></div><div style="position: absolute; padding-top: 6px; left: 60px; width: 380px;"><div style="font-size: 15px; color: #111111; margin-bottom: 5px;" ><a href="resource_page.php?resourceid=15">Introduction to SNAP</a></div></div><script type="text/javascript">
var config = { 
					over: function(){ $('#pub_hover_15').fadeIn(300); },
					interval: 100,
					out: function(){ $('#pub_hover_15').hide(0); } 
					};$('#pub_box_15').hoverIntent(config);$('#pub_close_15').click(
					function(){ $('#pub_hover_15').hide(0); }
				);</script>
</div>
html
);
    }

}

/**

what I want to test:

- existing code renders the same way.  how to test?
-- I can check static HTML against a known database configuration
-- extract the logic that creates the dynamic table into a class
-- need: DB fixtures

existing code breakdown:
"results count block": <span>Displaying 15 results</span>

"sort criteria": <div><span style="margin-left: 50px;"> Sort by Newest First | <a href="/resources.php?sort=oldest">Oldest First</a></span></div>

"individual result report": <div id="pub_box_10" style="width: 440px; height: 50px; display: inline-block; margin: 10px; margin-bottom: 10px; position: relative; "><div id="pub_hover_10" class="hover_box" ><div style="position: relative; "><div style="position: absolute; "><img alt="pub_report.png" src="images/pub_report.png" style="margin-left: 5px;" /></div><div style="position: relative;; left: 59px; width: 380px; ;"><div style="font-size: 15px; color: #111111; margin-top: 5px; margin-bottom: 5px;" ><a href="resource_page.php?resourceid=10">Reports for Boreal ALFRESCO</a></div><div style="position: relative; width: 420px; margin-bottom: 10px;"></div><div style="color: #666666;">Tags: ecological model</div></div></div><div style="margin-top: 10px;width: 420px; padding: 10px;">As Boreal ALFRESCO finishes modeling specific areas in Alaska, reports will be posted here to download. These reports focus on particular domains within the state and present maps, data, and other interpretations of model output. </div><div style="position: relative; left: 385px; bottom: 5px; margin-top: 10px;"><a id="pub_close_10" style="cursor: pointer; cursor: hand;">close &#8855;</a></div></div>
<div style="width: 50px; padding: 6px; position: absolute; z-index: 1;"><img alt="pub_report.png" src="images/pub_report.png" style="" /></div><div style="position: absolute; padding-top: 6px; left: 60px; width: 380px;"><div style="font-size: 15px; color: #111111; margin-bottom: 5px;" ><a href="resource_page.php?resourceid=10">Reports for Boreal ALFRESCO</a></div></div><script type="text/javascript">
var config = { 
					over: function(){ $('#pub_hover_10').fadeIn(300); },
					interval: 100,
					out: function(){ $('#pub_hover_10').hide(0); } 
					};$('#pub_box_10').hoverIntent(config);$('#pub_close_10').click(
					function(){ $('#pub_hover_10').hide(0); }
				);</script>
</div>

"individual result: paper" : <div id="pub_box_2" style="width: 440px; height: 50px; display: inline-block; margin: 10px; margin-bottom: 10px; position: relative; "><div id="pub_hover_2" class="hover_box" ><div style="position: relative; "><div style="position: absolute; "><img alt="pub_paper.png" src="images/pub_paper.png" style="margin-left: 5px;" /></div><div style="position: relative;; left: 59px; width: 380px; ;"><div style="font-size: 15px; color: #111111; margin-top: 5px; margin-bottom: 5px;" ><a href="resource_page.php?resourceid=2">Global Climate Model Performance over Alaska and Greenland</a></div><div style="position: relative; width: 420px; margin-bottom: 10px;"></div><div style="color: #666666;">Tags: climate modeling</div></div></div><div style="margin-top: 10px;width: 420px; padding: 10px;">Walsh, J. et al. 2008. Journal of Climate. v. 21 pp. 6156-6174.

The performance of a set of 15 global climate models used in the Coupled Model Intercomparison Project is evaluated for Alaska and Greenland, and compared with the performance over broader pan-Arctic and Northern Hemisphere extratropical domains.</div><div style="position: relative; left: 385px; bottom: 5px; margin-top: 10px;"><a id="pub_close_2" style="cursor: pointer; cursor: hand;">close &#8855;</a></div></div>
<div style="width: 50px; padding: 6px; position: absolute; z-index: 1;"><img alt="pub_paper.png" src="images/pub_paper.png" style="" /></div><div style="position: absolute; padding-top: 6px; left: 60px; width: 380px;"><div style="font-size: 15px; color: #111111; margin-bottom: 5px;" ><a href="resource_page.php?resourceid=2">Global Climate Model Performance over Alaska and Greenland</a></div></div><script type="text/javascript">
var config = { 
					over: function(){ $('#pub_hover_2').fadeIn(300); },
					interval: 100,
					out: function(){ $('#pub_hover_2').hide(0); } 
					};$('#pub_box_2').hoverIntent(config);$('#pub_close_2').click(
					function(){ $('#pub_hover_2').hide(0); }
				);</script>
</div>

"individual result: pub_presentation" : <div id="pub_box_12" style="width: 440px; height: 50px; display: inline-block; margin: 10px; margin-bottom: 10px; position: relative; "><div id="pub_hover_12" class="hover_box" ><div style="position: relative; "><div style="position: absolute; "><img alt="pub_presentation.png" src="images/pub_presentation.png" style="margin-left: 5px;" /></div><div style="position: relative;; left: 59px; width: 380px; ;"><div style="font-size: 15px; color: #111111; margin-top: 5px; margin-bottom: 5px;" ><a href="resource_page.php?resourceid=12">SNAP climate map animations and descriptions</a></div><div style="position: relative; width: 420px; margin-bottom: 10px;"></div><div style="color: #666666;">Tags: climate, SNAP</div></div></div><div style="margin-top: 10px;width: 420px; padding: 10px;">This PowerPoint animation was originally presented in a large-screen format at the SNAP information booth at the Alaska Forum on the Environment, January 2009. It was intended to offer a visual depiction of some of SNAP&#039;s map products to interested members of the public.</div><div style="position: relative; left: 385px; bottom: 5px; margin-top: 10px;"><a id="pub_close_12" style="cursor: pointer; cursor: hand;">close &#8855;</a></div></div>
<div style="width: 50px; padding: 6px; position: absolute; z-index: 1;"><img alt="pub_presentation.png" src="images/pub_presentation.png" style="" /></div><div style="position: absolute; padding-top: 6px; left: 60px; width: 380px;"><div style="font-size: 15px; color: #111111; margin-bottom: 5px;" ><a href="resource_page.php?resourceid=12">SNAP climate map animations and descriptions</a></div></div><script type="text/javascript">
var config = { 
					over: function(){ $('#pub_hover_12').fadeIn(300); },
					interval: 100,
					out: function(){ $('#pub_hover_12').hide(0); } 
					};$('#pub_box_12').hoverIntent(config);$('#pub_close_12').click(
					function(){ $('#pub_hover_12').hide(0); }
				);</script>
</div>

"individual result: video" : <div id="pub_box_15" style="width: 440px; height: 50px; display: inline-block; margin: 10px; margin-bottom: 10px; position: relative; "><div id="pub_hover_15" class="hover_box" ><div style="position: relative; "><div style="position: absolute; "><img alt="pub_video.png" src="images/pub_video.png" style="margin-left: 5px;" /></div><div style="position: relative;; left: 59px; width: 380px; ;"><div style="font-size: 15px; color: #111111; margin-top: 5px; margin-bottom: 5px;" ><a href="resource_page.php?resourceid=15">Introduction to SNAP</a></div><div style="position: relative; width: 420px; margin-bottom: 10px;"></div><div style="color: #666666;">Tags: </div></div></div><div style="margin-top: 10px;width: 420px; padding: 10px;">Dr. Scott Rupp introduces the Scenarios Network for Alaska &amp; Arctic Planning in this short video</div><div style="position: relative; left: 385px; bottom: 5px; margin-top: 10px;"><a id="pub_close_15" style="cursor: pointer; cursor: hand;">close &#8855;</a></div></div>
<div style="width: 50px; padding: 6px; position: absolute; z-index: 1;"><img alt="pub_video.png" src="images/pub_video.png" style="" /></div><div style="position: absolute; padding-top: 6px; left: 60px; width: 380px;"><div style="font-size: 15px; color: #111111; margin-bottom: 5px;" ><a href="resource_page.php?resourceid=15">Introduction to SNAP</a></div></div><script type="text/javascript">
var config = { 
					over: function(){ $('#pub_hover_15').fadeIn(300); },
					interval: 100,
					out: function(){ $('#pub_hover_15').hide(0); } 
					};$('#pub_box_15').hoverIntent(config);$('#pub_close_15').click(
					function(){ $('#pub_hover_15').hide(0); }
				);</script>
</div>



- new functionality renders properly in the main Resources tab as well as the drill-down screen for the new functionality


*/

?>