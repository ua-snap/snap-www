<?php
include("template.php");
$page = new webPage("SNAP: Data Analysis Tools", "", "data", 'Analysis Tools');
$page->openPage();
$page->pageHeader();

?>

<div id="main_body">
	<div id="main_content" style="min-height: 200px;" class="methods text">
		<h2>Data Analysis Tools</h2>
			<p>SNAP and <a href="http://accap.uaf.edu/" target="_blank">ACCAP</a> develop data analysis and visualization tools to aid the study of interrelated systems, improve decision making, manage resources, and inform policy. Explore and analyze historical data and SNAP climate projections with this set of dynamic presentation tools powered by <a href="http://www.r-project.org/" target="_blank">R</a> and <a href="http://www.rstudio.com/shiny/" target="_blank">Shiny</a>. Supplemental information about these and additional tools are available at the <a href="http://blog.snap.uaf.edu/" target="_blank">SNAP Blog</a>.</p>

		<div class="appsWrapper">

			<!--if at least one more app is added, we should change this page to use toolsWrapper and toolPanel, and possible name those something more general-->

			<a target="_blank" href="http://shiny.snap.uaf.edu/sea_ice_winds/" class="appPanel">
			<h3>Sea Ice Concentrations and Wind Events</h3>
			<img src="images/ice-wind-icon.png"/>
			<p>Examine projected interactions between monthly sea ice concentrations and extreme wind events.</p>
			</a>

			<a target="_blank" href="http://shiny.snap.uaf.edu/sea_ice_coverage/" class="appPanel" id="moo">
			<h3>Modeled Arctic Sea Ice Coverage</h3>
			<img src="images/sea-ice-icon.png"/>
			<p>Explore and visualize various models of historical and projected arctic sea ice extent and concentration through 2099.</p>
			</a>

			<a target="_blank" href="http://shiny.snap.uaf.edu/temp_wind_events/" class="appPanel">
			<h3>CMIP5 Quantile-mapped Daily Data</h3>
			<img src="images/event-freq-icon.png"/>
			<p>Analyze the frequency of extreme daily temperature and wind events from 1958 and projected through 2100.</p>
			</a>

<?php
$page->closePage();
?>

<script>
	console.log($('#moo').css('height'));
</script>