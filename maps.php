<?php
include_once("template.php");
$page = new webPage("SNAP: Maps", "maps.css", "data");
$page->openPage();
//$page->pageHeader();
$page->connectToDatabase();
?>

				<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"> </script>
				<script type="text/javascript" src="js/plugins.js"></script>
				<script type="text/javascript" src="js/maps.js"></script>
				<script type="text/javascript">
				      google.maps.event.addDomListener(window, 'load', init);
					$(window).resize(resize);

				</script>	
				<!--
				<div id="controls">
					<input type="button" onclick="javascript:drawPoly();" value="Draw Polygon" class="btn" />
					<input type="button" onclick="javascript:drawRectangle();" value="Draw Rectangle" class="btn" />
				</div>
				-->
				<?php
					$g_var = "Mean Annual Precipitation";
					if ($_GET['var']){
						$g_var = " WHERE variable='".mysql_real_escape_string($_GET['var'])."'";
					}
					$query = "SELECT variable FROM tileset GROUP BY variable";
					$result = mysql_query($query);
				?>	
				<div id="map_header" style="height: auto;">
					<div style="margin-top: 0px; margin-bottom: 0px;">
						<div style="float: left;"><img style="margin-top: 20px; margin-bottom: 20px; vertical-align: middle" src="images/logo_snap_maps_stats.png" /></div>
						<div id="model_menu" style="float: left;">
							<div id="snap_name" style="color: #505a5c; margin-left: 30px; font-size: 20px; margin-top: 40px;">Scenarios Network for Alaska &amp; Arctic Planning</div>	
						<div id="menu_items" style="display: none; color: #505a5c; margin-left: 50px; font-size: 14px; margin-top: 10px;">
						<?php //include("maps_update.php"); ?>
						</div>
						<script type="text/javascript">
							buildMenu("Mean Annual Temperature");
						</script>
					</div>
				</div>
						<script type="text/javascript">
							$("#snap_name").hide();
							$("#menu_items").show();
							updateMenu();
						</script>
					<div class="map_bar" style="clear: both;">
						<div style="float: left; margin-left: 20px; font-size: 20px;"><a href="">Main Menu</a></div>
						<div style="float: right; margin-left: 20px; font-size: 20px; height: 38px; border-left: 4px solid #ffffff; background-color: #97A93A"><a href="" style="color: #ffffff;"><img style="margin-left: 20px; margin-right: 20px;" src="/images/share.png" /></a></div>
						<div style="float: right; margin-left: 20px; font-size: 14px;">
							<span style="margin-right: 10px;">This Map: </span>
							<span style="margin-right: 15px;"><a href="">Info</a></span>
							<span style="margin-right: 15px;"><a href="">Stats</a></span>
							<span style="margin-right: 15px;"><a href="">Print</a></span>
							<span style="margin-right: 15px;"><a href="">Link</a></span>
							<span style="margin-right: 15px;"><a href="">Download</a></span>
						</div>
					</div>
				</div>
				<div id="map_wrapper">
					<div id="map_canvas"></div>
				</div>
				<div id="map_footer">
					<div class="map_bar">
						<span style="float: left; margin-left: 20px; color: #333333;"><a href="">Help</a> | <a href="">About this tool</a></span>
						<span style="float: right; margin-right: 20px; color: #333333;"><a href="http://www.uaf.edu"><img style="height: 28px;" src="images/UAFLogo_A_white.png" /></a></span>
						<span style="float: right; margin-right: 35px; color: #333333;"><a href="http://dev.snap.uaf.edu"><img src="images/snap_acronym_white.png" /></a></span>
					</div>
				</div>
	</body>
</html>
<?php

//$page->closePage();
?>
