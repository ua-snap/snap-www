<?php
include("template.php");
$page = new webPage("SNAP: Maps", "maps.css", "data");
$page->openPage();
$page->pageHeader();
?>
		<div id="main_body">

			<div id="main_content">
				<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"> </script>
				<script type="text/javascript" src="js/maps.js"></script>
				<script type="text/javascript">
				      google.maps.event.addDomListener(window, 'load', init);
				</script>	
				<div id="controls">
					<input type="button" onclick="javascript:drawPoly();" value="Draw Polygon" class="btn" />
					<input type="button" onclick="javascript:drawRectangle();" value="Draw Rectangle" class="btn" />
				</div>
				<div id="map_wrapper" style="position: relative;">
					<div id="map_canvas" style="height: 600px; position: relative;"></div>
			
					<div id="legend_title" style="width: 75px; height: 20px; position: absolute; left: 3px; top: 255px; border: 2px solid #ffffff; background-color: #ace1af; margin: 3px; margin-bottom: 5px; text-align: center; line: height: 40px;">Legend</div>
					<div id="legend" style="width: 75px; height: 220px; position: absolute; left: 3px; top: 305px; border: 2px solid #ffffff; background-color: #ace1af; margin: 3px;"></div>
					<div id="mapMenu">
						<div style="margin: 3px;">
							<select style="background-color: #ace1af; border: 0px; border: 2px solid #ffffff; width: 250px;">
								<option>Length of Growing Season</option>
								<option>Date of Freeze Up</option>
								<option>Date of Thaw</option>
							</select>
						</div>
						<div style="margin: 3px;">
							<select style="background-color: #ace1af; border: 0px; border: 2px solid #ffffff; width: 250px;">
								<option>2000-2009</option>
								<option>2030-2039</option>
								<option>2060-2069</option>
								<option>2090-2099</option>
							</select>
						</div>
						<div style="margin: 3px;">
							<select style="background-color: #ace1af; border: 0px; border: 2px solid #ffffff; width: 150px;">
								<option>5 Model Average</option>
							</select>
							<select style="background-color: #ace1af; border: 0px; border: 2px solid #ffffff; width: 95px;">
								<option>A1B</option>
								<option>A2</option>
								<option>B1</option>
							</select>
						</div>
					</div>
					<div id="location"></div>
					<div style="position: absolute; width: 200px; left: 325px; height: 50px; margin: auto; top: 525px; background-color: #ace1af; border: solid 2px #ffffff; text-align: center;" onclick="javascript:expandQuery(this);" id="data_query">
						Advanced Data Query
					</div>
						<div>
							<div id="poly_points"></div>
						</div>


					<div style="width: 215px; left: 340px; top: 5px; background-color: #ffffff; position: absolute; "><img height="50px"  src="images/snap_rgb.png" alt="SNAP Logo" /></div>
					<div id="size_toggle" style="background-color: #ace1af; border: solid 2px #ffffff; width: 40px; height: 25px; left: 810px; top: 550px; position: absolute;" onclick="javascript:maximize();">Max</div>

				</div>




					</div>
	<?php
	?>
			</div>
<?php
$page->closePage();
?>
