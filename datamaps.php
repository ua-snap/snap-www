<?php
include("template.php");
$page = new webPage("SNAP: Data Downloads", "", "data");
$page->openPage();
$page->pageHeader();

?>
<div id="main_body">
	<div id="main_content" style="min-height: 200px;" class="methods text">

		<h2>Tools and Data</h2>

		<p>At SNAP, we develop tools that enable you to reveal trends and patterns in climate that are of interest to a wide range of people and organizations. Please explore the tools below, or download raw data for your own analyses, and please let us know any feedback by <a href="people.php#contact">contacting us</a>.
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

	<?php echo Config::$termsOfUse; ?>

</div>

<?php $page->closePage(); ?>
