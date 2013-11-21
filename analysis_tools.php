<?php
include("template.php");
$page = new webPage("SNAP: Data Analysis Tools", "", "data");
$page->openPage();
$page->pageHeader();

?>

<div id="main_body">
	<div id="main_content" style="min-height: 200px;" class="methods text">
		<h2>Data Analysis Tools</h2>
			<p>SNAP and ACCAP (<a href="http://accap.uaf.edu/" target="_blank">http://accap.uaf.edu/</a>) develop data analysis and visualization tools to aid the study of interrelated systems, improve decision making, manage resources, and inform policy. Explore and analyze historical data and SNAP climate projections with this set of dynamic presentation tools powered by R (<a href="http://www.r-project.org/" target="_blank">http://www.r-project.org/</a>) and Shiny (<a href="http://www.rstudio.com/shiny/" target="_blank">http://www.rstudio.com/shiny/</a>). Supplemental information about these and additional tools are available at the SNAP Blog (<a href="http://blog.snap.uaf.edu/" target="_blank">http://blog.snap.uaf.edu/</a>).</p>

		<div class="appsWrapper">

			<!--if at least one more app is added, we should change this page to use toolsWrapper and toolPanel, and possible name those something more general-->

			<a href="http://shiny.snap.uaf.edu/sea_ice_winds/" class="appPanel">
			<h3>Sea Ice Concentrations and Wind Events</h3>
			<img src="images/ice-wind-icon.png"/>
			<p>Examine projected interactions between monthly sea ice concentrations and days exhibiting extreme wind events</p>
			</a>

			<a href="http://shiny.snap.uaf.edu/sea_ice_coverage/" class="appPanel" id="moo">
			<h3>Modeled Arctic Sea Ice Coverage</h3>
			<img src="images/sea-ice-icon.png"/>
			<p>Compare and explore observed and model projections of arctic sea ice extent and concentration through 2099</p>
			</a>

			<a href="http://shiny.snap.uaf.edu/temp_wind_events/" class="appPanel">
			<h3>CMIP5 Quantile-mapped Daily Data</h3>
			<img src="images/event-freq-icon.png"/>
			<p>Analyze the frequency of extreme daily temperature and wind events from 1958 and projected through 2100</p>
			</a>

<?php
$page->closePage();
?>

<script>
	console.log($('#moo').css('height'));
</script>