<?php
include("template.php");
$page = new webPage("SNAP: Maps", "maps.css", "data");
$page->openPage();
//$page->pageHeader();
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
				<div id="map_header" style="height: auto;">
					<div style="margin-top: 0px; margin-bottom: 0px;">
						<div style="float: left;"><img style="margin-top: 20px; margin-bottom: 20px; vertical-align: middle" src="images/logo_snap_maps_stats.png" /></div>
						<div id="model_menu" style="float: left;">
							<div id="snap_name" style="color: #505a5c; margin-left: 30px; font-size: 20px; margin-top: 40px;">Scenarios Network for Alaska &amp; Arctic Planning</div>
						<div id="menu_items" style="display: none; color: #505a5c; margin-left: 50px; font-size: 14px; margin-top: 10px;">
							<div style="color: #444444; font-size: 12px;">currently viewing</div>
							<div style="margin-top: 5px;" id="mapMenu">
								<div>	
									<div class='menuOption' id='menu_variable' style="font-size: 18px;">
										<div><span class="menuTitle">Date of Thaw</span></div>
										<div class='menuSpacer'><span></span></div>
										<div class='menuContents'>
											<div class="menuContentsLeft">
												<div>Length of Growing Season</div>
												<div>Date of Thaw</div>
												<div>Date of Freeze Up</div>
												<div>Mean Annual Temperature</div>
												<div>Mean Annual Precipitation</div>
											</div>
											<div class="menuContentsRight">XYZ</div>
										</div>
									</div>
									<div class='menuOption' id='menu_interval' style="font-size: 18px;">
										<div>as <span class="menuTitle" style="font-size: 18px;">10 year averages</span></div>
										<div class='menuSpacer'></div>
										<div class='menuContents'>
											<div class="menuContentsLeft">
												<div>10 year averages</div>
												<div>20 year averages</div>
											</div>
											<div class="menuContentsRight">XYZ</div>
										</div>
									</div>
									<div class='menuOption' id='menu_range' style="font-size: 18px;">
										<div>from <span class="menuTitle" style="font-size: 18px;">2050-2090</span></div>
										<div class='menuSpacer'></div>
										<div class='menuContents'>
											<div class="menuContentsLeft">
												<div>1971-2000</div>
												<div>2010-2019</div>
												<div>2050-2059</div>
												<div>2090-2099</div>
											</div>
											<div class="menuContentsRight">XYZ</div>
										</div>
									</div>

								</div>
								<div style="margin-top: 15px; font-size: 10px;">
									<div class='menuOption' id='menu_scenario'>
										<div>assuming <span class="menuTitle" style="font-size: 10px;">mid-range emissions (A1B)</span></div>
										<div class='menuSpacer'></div>
										<div class='menuContents'>
											<div class="menuContentsLeft">
												<div>rapid increases in emissions (A2)</div>
												<div>mid-range emissions (A1B)</div>
												<div>leveling and declining emissions (B1)</div>
											</div>
											<div class="menuContentsRight">XYZ</div>
										</div>
									</div>
									<div class='menuOption' id='menu_model'>
										<div>using the <span class="menuTitle" style="font-size: 10px;">GCM 5 average</span></div>
										<div class='menuSpacer'></div>
										<div class='menuContents'>
											<div class="menuContentsLeft">
												<div></div>
											</div>
											<div class="menuContentsRight">XYZ</div>
										</div>
									</div>
									<div class='menuOption' id='menu_resolution'>
										<div>downscaled to <span class="menuTitle" style="font-size: 10px;">2km</span> resolution</div>
										<div class='menuSpacer'></div>
										<div class='menuContents'>
											<div class="menuContentsLeft">
												<div></div>
											</div>
											<div class="menuContentsRight">XYZ</div>
										</div>
									</div>

								</div>
								<script type="text/javascript">
									$('#menu_variable').click( function() { showVariable(this); } );
									$('#menu_interval').click( function() { showVariable(this); } );
									$('#menu_range').click( function() { showVariable(this); } );
									$('#menu_scenario').click( function() { showVariable(this); } );
									$('#menu_model').click( function() { showVariable(this); } );
									$('#menu_resolution').click( function() { showVariable(this); } );
									$('.menuContentsLeft div').click( function() {
										$(this).parents(".menuOption").find(".menuTitle").html($(this).html());
										//updateMenu();
										//$menuSpacer.removeClass("menuSpacerToggle");
										updateMenu();
									});
									</script>
								
								</div>
							</div>
						
						<script type="text/javascript">
							//$("#model_menu").click( function(){ 
								$("#snap_name").hide();
								$("#menu_items").show();
								updateMenu();	
							//});
						</script>
					</div>
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
					<!--
						<div>
							<div id="poly_points"></div>
						</div>
					-->

				</div>
				<div id="map_footer">
					<div class="map_bar">
						<span style="float: left; margin-left: 20px; color: #333333;"><a href="">Help</a> | <a href="">About this tool</a></span>
						<span style="float: right; margin-right: 20px; color: #333333;"><a href="http://www.uaf.edu"><img style="height: 28px;" src="images/UAFLogo_A_white.png" /></a></span>
						<span style="float: right; margin-right: 35px; color: #333333;"><a href="http://dev.snap.uaf.edu"><img src="images/snap_acronym_white.png" /></a></span>
					</div>
				</div>

<?php
//$page->closePage();
?>
