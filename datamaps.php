<?php
include("template.php");
$page = new webPage("SNAP: Tools and Data", "", "data");
$page->openPage();
$page->pageHeader();

?>
        <div id="main_body">
            <div id="main_content" style="min-height: 200px;" class="methods text">
            <h2>Tools and Data</h2>


<p>All SNAP <a href="/data.php">data</a>, <a href="/methods.php">methods</a>, <a href="/modeling.php">models</a>, and <a href="/projects.php">project results</a> are freely available to the public. We do our best to provide data in formats that are accessible to a wide range of users. Currently, all of our data are available for download as GeoTIFF files. Selected maps and data are available for online browsing and download via our web-based <a href="maps.php" target="_blank">Map Tool</a> and our <a href="/charts.php">Community Charts</a> page.
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


</div>

        </div>
    </div>
<?php
$page->closePage();
?>

