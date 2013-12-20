<?php
include("template.php");
$page = new webPage("SNAP: Tools and Data", "", "data");
$page->openPage();
$page->pageHeader();

?>
<div id="main_body">
	<div id="main_content" style="min-height: 200px;" class="methods text">

		<h2>Tools and Data</h2>

		<p>At SNAP, we develop tools that enable you to reveal trends and patterns in climate that are of interest to a wide range of people and organizations. Please explore the tools below, or download raw data for your own analyses, and please let us know any feedback by <a href="people.php#contact">contacting us</a>.
		</p>

<a href="/charts.php" class="toolPanel">
<img src="images/chart-icon.png"/>
<h3>Community Charts</h3>
<p>Investigate temperature and precipitation projections for thousands of communities across Alaska and Canada.</p>
</a>

<a href="/maps.php" class="toolPanel">
<img src="images/map-tool-icon.png"/>
<h3>Map Tool</h3>
<p>Visually browse and compare scenarios created from SNAP data using the interactive map tool.</p>
</a>

<div class="toolsWrapper">
<a href="/analysis_tools.php" class="toolPanel">
<img src="images/analysis-icon.png"/>
<h3>Analysis Tools</h3>
<p>Explore and analyze SNAP climate data with this set of dynamic presentation tools powered by R and Shiny.</p>
</a>

<a href="http://seaiceatlas.snap.uaf.edu" target="_blank" class="toolPanel">
<img src="images/sea-ice-atlas-icon.png"/>
<h3>Sea Ice Atlas</h3>
<p>View historical sea ice data collected between 1850 and today on an interactive map of the seas off Northern Alaska.</p>
</a>

<a href="/data.php" class="toolPanel">
<img src="images/download-icon.png"/>
<h3>Download Data</h3>
<p>Download projected and historical datasets in the GeoTIFF format for your own research purposes.</p>
</a>
	<?php echo Config::$termsOfUse; ?>

</div>
    </div>
    </div>
<?php
$page->closePage();
?>