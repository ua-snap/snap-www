<?php 
include("template.php");
$page = new webPage("SNAP: About", "style.css", "about");
$page->openPage();
	$page->pageHeader();
?>
		<div id="main_body">
			<!--

			-->

			<div id="main_content">
				<div class="subHeader">all <img style="vertical-align: middle" height="55" src="images/about.png" alt="About" /> the Scenarios Network for Alaska &amp; Arctic Planning</div>
				<h2>Who are we?</h2>
				<p style="font-size: 14px;">We're the Scenarios Network for Alaska &amp; Arctic Planning, part of the University of Alaska Fairbanks and the School of Natural Resources and Agricultural Science.</p>
				<h2>What do we do?</h2>
				<p style="font-size: 14px;">We currently work with a variety of government and non-government agencies to produce maps and datasets projecting future conditions. </p>
				<h2>Where are we?</h2>
				<p style="font-size: 14px;">We're located in Fairbanks, Alaska.  You can find us <a href="here">here</a>. </p>
<? 
?>
		</div>
	</div>
<?php
$page->closePage();
?>
