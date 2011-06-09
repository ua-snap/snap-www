<?php
include("template.php");
$page = new webPage("SNAP: Community Charts", "", "data");
$page->openPage();
$page->pageHeader();
$page->connectToDatabase();
?>
		<div id="main_body">
			<div id="main_content">
				<div class="subHeader">Community Charts</div>
			</div>


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/highcharts.js"></script>
    <script type="text/javascript" src="js/exporting.js"></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load('visualization', '1', {packages:['corechart']});
    </script>

  </head>
  <body>
	<div style="margin: auto;">
		<div style="height: 110px; margin: auto; margin-bottom: 20px; width: 950px;">
			<div style="width: 300px; height: 110px; overflow: auto; padding: 5px; border: 1px solid #999999; float: left;">
			<?php
				$query = "SELECT community FROM community_charts GROUP BY community";
				$result = mysql_query($query) or die(mysql_error());
				while ($row = mysql_fetch_array($result)){
					$comm = preg_replace("/\s/", "-", $row['community']);
					echo "<div><a style=\"cursor: hand; cursor: pointer;\" id=\"$comm\">".$row['community']."</a></div>";
				}
			?>
			<script type="text/javascript">

				var globalCommunity;
				<?php 
					if ($_GET['community']){ echo "globalCommunity = '".$_GET['community']."';"; } 
					else { echo "globalCommunity = '';"; }
				?>
				var globalDataset;
				<?php 
					if ($_GET['dataset']){ echo "globalDataset = '".$_GET['dataset']."';"; } 
					else { echo "globalDataset = 1;"; }
				?>
				var globalScenario;
				<?php 
					if ($_GET['scenario']){ echo "globalScenario = '".$_GET['scenario']."';"; } 
					else { echo "globalScenario = 'A1B';"; }
				?>
				var globalVariability;
				<?php 
					if ($_GET['variability']){ echo "globalVariability = '".$_GET['variability']."';"; } 
					else { echo "globalVariability = '0';"; }
				?>

				function fetchData(comm, type, scen, vari){
					$.get(
						"ajax_fetch_data.php", { community : comm, dataset: type, scenario : scen, variability: vari },
						function(data){
							$('#display').html(data);
							drawChart();
						}, "html");
				}
				$(document).ready(function(){
				<?php
				if ($_GET['community']){
					$vari = 0;
					if (isset($_GET['variability'])){
						$vari = $_GET['variability'];
					}
					if (isset($_GET['scenario'])){
						$scenario = $_GET['scenario'];
					}
					echo "fetchData(globalCommunity, globalDataset, globalScenario, globalVariability);";

				}
				?>
				
				function buildControls(){
					
				}

			<?php
				$result = mysql_query($query) or die(mysql_error());
				while ($row = mysql_fetch_array($result)){
					$comm = preg_replace("/\s/", "-", $row['community']);
					echo "$('#".$comm."').click( function() { fetchData('$comm', globalDataset, globalScenario, globalVariability); } );";
				}
			?>
				});
			</script>
			</div>
			<div style="width: 426px; margin-left: 10px; height: 120px; float: left;  border: 1px solid #ffffff;">
				<div style="color: #666666; margin: auto; font-size: 14px; text-align: center; margin-top: 15px;">
					Data Set
				</div>
				<div id="dataset" style="margin: auto; font-size: 18px; text-align: center; margin-bottom: 10px;">
					<span id="temp">Temperature</span> | 
					<span id="precip"><a>Precipitation</a></span>
					<script type="text/javascript">
						$('#temp').click( function() { 
							fetchData(globalCommunity, 1, globalScenario, globalVariability); 
							$('#temp').html("Temperature");
							$('#precip').html("<a>Precipitation</a>");
						});
						$('#precip').click( function() { 
							fetchData(globalCommunity, 2, globalScenario, globalVariability); 
							$('#temp').html("<a>Temperature</a>");
							$('#precip').html("Precipitation");
						});
					</script>
				</div>
				<div style="color: #666666; margin: auto; font-size: 14px; text-align: center; margin-top: 0px;">Emissions Scenario</div>
				<div id="" style="margin: auto; font-size: 20px; text-align: center; margin-bottom: 10px;">
					<?php if ($_GET['scenario'] == 'B1'){
						 echo "<span id=\"scen_low\">Low</span>";
					      } else {
						 echo "<span id=\"scen_low\"><a>Low</a></span>";
					      }
					?>
					 | 
					<?php if ($_GET['scenario'] == 'A1B'){
						 echo "<span id=\"scen_med\">Medium</span>";
					      } else {
						 echo "<span id=\"scen_med\"><a>Medium</a></span>";
					      }
					?>
					 | 
					<?php if ($_GET['scenario'] == 'A2'){
						 echo "<span id=\"scen_high\">High</span>";
					      } else {
						 echo "<span id=\"scen_high\"><a>High</a></span>";
					      }
					?>
					<script type="text/javascript">
						$('#scen_low').click( function() { 
							fetchData(globalCommunity, globalDataset, 'B1', globalVariability); 
							$('#scen_low').html("Low");
							$('#scen_med').html("<a>Medium</a>");
							$('#scen_high').html("<a>High</a>");
						});
						$('#scen_med').click( function() { 
							fetchData(globalCommunity, globalDataset, 'A1B', globalVariability); 
							$('#scen_low').html("<a>Low</a>");
							$('#scen_med').html("Medium");
							$('#scen_high').html("<a>High</a>");
						});
						$('#scen_high').click( function() { 
							fetchData(globalCommunity, globalDataset, 'A2', globalVariability); 
							$('#scen_low').html("<a>Low</a>");
							$('#scen_med').html("<a>Medium</a>");
							$('#scen_high').html("High");
						});
					</script>
				</div>
			</div>
			<div style="width: 188px; margin-left: 10px; height: 120px; float: left; ">
				<!--
				<div style="margin: auto; font-size: 18px; margin-bottom: 10px; margin-top: 20px;"><span style="color: #0066cc;">Print</span></div>
				<div style="margin: auto; font-size: 18px; margin-bottom: 10px;"><span style="color: #0066cc;">Download</span></div>
				-->
				<div style="color: #666666; margin: auto; font-size: 14px; text-align: center; margin-top: 65px;">Model Variability</div>
				<div id="" style="margin: auto; font-size: 20px; text-align: center; margin-bottom: 10px;">
					<span id="model_vari_on"><a>On</a></span>
					<span id="model_vari_off">Off</span>
					<script type="text/javascript">
						$('#model_vari_on').click( function() { 
							fetchData(globalCommunity, globalDataset, globalScenario, 1); 
							$('#model_vari_on').html("On");
							$('#model_vari_off').html("<a>Off</a>");
						});
						$('#model_vari_off').click( function() { 
							fetchData(globalCommunity, globalDataset, globalScenario, 0); 
							$('#model_vari_on').html("<a>On</a>");
							$('#model_vari_off').html("Off");
						});
					</script>
				</div>
				
			</div>

		</div>
		<div style="position: relative; margin: auto; border: 1px solid #999999; width: 950px; height: 460px;">
			<div style="top: 20px; position: absolute; width: 900px;" id="display"></div>
			<!--
			<div style="height: 100px; position: absolute; "><img src="http://dev.snap.uaf.edu/images/snap_acronym_rgb.png" style="height: 50px; margin-left: 110px; margin-top: 30px;" /></div>
			-->
		</div>
		<div>
			<div style="font-size: 18px; margin-bottom: 10px; margin-top: 10px;">Interpreting the Community Charts</div>
			<p>These community graphs can be examined for certain key changes and threshold values. For example, mean monthly temperatures shifting above freezing in spring and fall may be of particular interest. This may signify a longer growing season, a loss of ice and/or frozen ground needed for travel or food storage, or a shift in precipitation from snow to rain, which will impact water storage capacity and surface water availability. In many cases, winter temperatures are projected to increase dramatically. This in turn may allow for the growth of less cold-hardy species, including either desirable crops or invasive species, or it may decrease snowpack and increase the frequency of rain on snow events that impact wildlife. Warmer, drier spring weather may be an indicator for increased fire risk. Warmer temperatures across all seasons may impact permafrost and land-fast ice.</p>
			<p>These graphs show mean outputs from the five GCMs. Results are also averaged across decades. This averaging lessens the impact of normal year-to-year climate variability, and thus tends to make overall projected trends clearer. It is important to note that uncertainty is associated with each of these graphed values. Uncertainty stems from the modeling of atmospheric and oceanic movements used to create the GCMs, from the PRISM downscaling process, and from the assumptions made regarding greenhouse gas levels for each emission scenario. Variability between the five GCMs is generally in the range of 0-4°F for temperature and 0-0.7 inches for precipitation. In general, a higher percentage of uncertainty is associated with precipitation values than with temperature values. It should also be noted that although our models project increases in precipitation, overall water availability is likely to decrease due to longer growing seasons and warmer weather, as detailed in our report on <a href="/downloads/climate-change-impacts-water-availability-alaska">climate change impacts on water availability in Alaska</a>.</p>

			<div style="font-size: 18px; margin-bottom: 10px; margin-top: 10px;">How the Community Charts Data Was Derived</div>

			<p>SNAP climate models rely on output from Global Circulation Models (GCMs) used by the <a href="http://www.ipcc.ch/">Intergovernmental Panel on Climate Change (IPCC)</a>. Each model was created by a different research team using slightly different data and assumptions. We compared model output for past years to actual climate data for the same time period, and selected five GCMs (from a total of fifteen) based on their accuracy in Alaska and other northern regions. SNAP then scaled down outputs to the local level using data from Alaskan weather stations and PRISM, a model that accounts for land features such as slope, elevation, and proximity to coastlines. Information for each community is based on the closest 2 km by 2 km grid square from SNAP's statewide datasets.</p>

			<p>For further information on SNAP models and SNAP projects, please explore our <a href="/resources.php">documents and fact sheets</a>.</p>

		</div>
	</div>
		</div>
	</div>
<?php
$page->closePage();
?>
