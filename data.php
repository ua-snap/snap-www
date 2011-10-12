<?php
include("template.php");
$page = new webPage("SNAP: Data", "", "data");
$page->openPage();
$page->pageHeader();
?>
		<div id="main_body">
			<div id="main_content">
				<div class="subHeader">Maps &amp; Data</div>
				<div>
					<p>All SNAP data, methods, model outputs, and project results are freely available to the public. We do our best to provide data in formats that are accessible to a wide range of users. Currently, all of our basic data are available for download as ASCII files and KML (Google Earth) files. Selected maps and data are available for online browsing and download via our web-based <a href="/maps.php" target="_blank">Map Tool</a> and our <a href="charts.php">Community Charts</a> page.</p>
				</div>
			</div>
		</div>
<?php
$page->closePage();
?>
