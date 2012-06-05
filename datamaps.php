<?php
include("template.php");
$page = new webPage("SNAP: Data Downloads", "", "data");
$page->openPage();
$page->pageHeader();

?>
        <div id="main_body">
            <div id="main_content" style="min-height: 200px;" class="methods text">
            <h2>Tools and Data</h2>


<p>All SNAP <a href="/data.php">data</a>, <a href="/methods.php">methods</a>, <a href="/modeling.php">models</a>, and <a href="/projects.php">project results</a> are freely available to the public. We do our best to provide data in formats that are accessible to a wide range of users. Currently, all of our data are available for download as GeoTIFF files. Selected maps and data are available for online browsing and download via our web-based <a href="maps.php" target="_blank">Map Tool</a> and our <a href="/charts.php">Community Charts</a> page.
</p>

<div class="toolsWrapper">

<a href="/data.php" class="toolPanel">
<h3>Download Data</h3>
<img src="images/download-icon.png"/>
<p>Download projected and historical datasets in the GeoTIFF format for your own research purposes.</p>
</a>

<a href="maps.php" class="toolPanel">
<h3>Map Tool</h3>
<img src="images/map-icon-multi2.png"/>
<p>Visually browse and compare scenarios created from SNAP data using the interactive<br/> map tool.</p>
</a>

<a href="/charts.php" class="toolPanel">
<h3>Community Charts</h3>
<img src="images/chart-icon.png"/>
<p>Investigate temperature and precipitation projections for thousands of communities across Alaska and Canada.</p>
</a>

</div>

        </div>
    </div>
<?php
$page->closePage();
?>
