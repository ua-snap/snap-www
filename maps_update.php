<?php
include("template.php");
$pageX = new webPage("", "", "");
$pageX->connectToDatabase();
if ($_GET['requesttype'] == "build"){
	$activeVariable = "Mean Annual Precipitation";
	$addVar = "";
	if ($_GET['variable']){
		$activeVariable = mysql_real_escape_string($_GET['variable']);
		$addVar = " ORDER BY FIELD(variable, '$activeVariable') DESC";
	}
	$query = "SELECT variable,description,legend FROM tileset LEFT JOIN tileset_descriptions ON variable=name GROUP BY variable $addVar";
	$result = mysql_query($query);
	$count = 0;

?>
<div style="color: #444444; font-size: 12px;">currently viewing</div>
<div style="margin-top: 5px;" id="mapMenu">
	<div>	
		<div class='menuOption' id='menu_variable' style="font-size: 18px;">
			<div><span class="menuTitle">
			<?php 
				$left = "";
				$right = "";
				$row = mysql_fetch_array($result);
				$legend = $row['legend'];
				echo "<script type='text/javascript'>$('#legend').html(drawLegend('$legend'));</script>";
				$activeVariable = $row['variable'];
				echo "<script type='text/javascript'>globalVariable = '".$row['variable']."';</script>";
				echo $activeVariable; 
			?>
			</span></div>
			<div class='menuSpacer'><span></span></div>
			<div class='menuContents'>
				<?php
				$query = "SELECT variable,description FROM tileset LEFT JOIN tileset_descriptions ON variable=name GROUP BY variable";
				$result = mysql_query($query);
				while ($row = mysql_fetch_array($result)){
					$left .= "<div id='var_$count'><span>".$row['variable']."</span></div>";
					$right .= "<div id='desc_$count' style='display: none;'>".$row['description']."</div>";
					$count++;
				}
				?>
				<div class="menuContentsLeft"> <?php echo $left; ?> </div>
				<div class="menuContentsRight"> <?php echo $right; ?> </div>
			</div>
		</div>
		<div class='menuOption' id='menu_interval' style="font-size: 18px;">
			<div>as <span class="menuTitle" style="font-size: 18px;">
				<?php
					$addInt = "";
					if ($_GET['interval']){
						$addInt = " ORDER BY FIELD(dateinterval, '".$_GET['interval']."') DESC";
					}
					$subquery = "SELECT dateinterval FROM tileset WHERE variable='$activeVariable' GROUP BY dateinterval $addInt";
					$subresult = mysql_query($subquery) or die(mysql_error());
					$subrow = mysql_fetch_array($subresult);
					echo $subrow['dateinterval']; 
					echo "<script type='text/javascript'>globalInterval = '".$subrow['dateinterval']."';</script>";
				?>
			</span></div>
			<div class='menuSpacer'></div>
			<div class='menuContents'>
				<?php
					$left = "";
					$right = "";
					$subquery = "SELECT dateinterval,description FROM tileset LEFT JOIN tileset_descriptions ON dateinterval=name WHERE variable='$activeVariable' GROUP BY dateinterval";
					$subresult = mysql_query($subquery) or die(mysql_error());
					while ($subrow = mysql_fetch_array($subresult)){
						$left .= "<div id='var_$count'><span>".$subrow['dateinterval']."</span></div>";
						$right .= "<div id='desc_$count' style='display: none;'>".$subrow['description']."</div>";
						$count++;
					}
				?>
				<div class="menuContentsLeft"> <?php echo $left; ?> </div>
				<div class="menuContentsRight"> <?php echo $right; ?> </div>
			</div>
		</div>
		<div class='menuOption' id='menu_range' style="font-size: 18px;">
			<div>from <span class="menuTitle" style="font-size: 18px;">
				<?php
					$addRan = "";
					if ($_GET['range']){
						$addRan = " ORDER BY FIELD(daterange, '".$_GET['range']."') DESC";
					}
					$subquery = "SELECT daterange FROM tileset WHERE variable='$activeVariable' GROUP BY daterange $addRan";
					$subresult = mysql_query($subquery) or die(mysql_error());
					$subrow = mysql_fetch_array($subresult);
					echo $subrow['daterange']; 
					echo "<script type='text/javascript'>globalRange = '".$subrow['daterange']."';</script>";
				?>
			</span></div>
			<div class='menuSpacer'></div>
			<div class='menuContents'>
				<?php
					$left = "";
					$right = "";
					$subquery = "SELECT daterange,description FROM tileset LEFT JOIN tileset_descriptions ON daterange=name WHERE variable='$activeVariable' GROUP BY daterange";
					$subresult = mysql_query($subquery) or die(mysql_error());
					while ($subrow = mysql_fetch_array($subresult)){
						$left .= "<div id='var_$count'><span>".$subrow['daterange']."</span></div>";
						$right .= "<div id='desc_$count' style='display: none;'>".$subrow['description']."</div>";
						$count++;
					}
				?>
				<div class="menuContentsLeft"> <?php echo $left; ?> </div>
				<div class="menuContentsRight"> <?php echo $right; ?> </div>
			</div>
		</div>
	</div>
<div style="margin-top: 15px; font-size: 10px;">
	<div class='menuOption' id='menu_scenario'>
		<div>assuming <span class="menuTitle" style="font-size: 10px;">
			<?php
			$addSce = "";
			if ($_GET['scenario']){
				$addSce = $_GET['scenario'];
			}
			if ($addSce == "A1B"){ echo "mid-range emissions (A1B)"; }
			else if ($addSce == "A2"){ echo "rapid increases in emissions (A2)"; }
			else if ($addSce == "B1"){ echo "leveling and declining emissions (B1)"; }
			else {
				$addSce = "A1B"; 
				echo "mid-range emissions (A1B)";
			}
			?>
		</span></div>
		<div class='menuSpacer'></div>
		<div class='menuContents'>
			<?php
				$left = "";
				$right = "";
				$left .= "<div id='var_$count'>rapid increases in emissions (<span>A2</span>)</div>";
				$right .= "<div id='desc_$count' style='display: none;'>The Intergovernmental Panel on Climate Change created a range of scenarios to explore alternative development pathways, covering a wide range of demographic, economic and technological driving forces and resulting greenhouse gas emissions. The A2 scenario describes a very heterogeneous world with high population growth, slow economic development and slow technological change.</div>";
				$count++;
				$left .= "<div id='var_$count'>mid-range emissions (<span>A1B</span>)</div>";
				$right .= "<div id='desc_$count' style='display: none;'>The Intergovernmental Panel on Climate Change created a range of scenarios to explore alternative development pathways, covering a wide range of demographic, economic and technological driving forces and resulting greenhouse gas emissions. The Scenario A1B assumes a world of very rapid economic growth, a global population that peaks in mid-century, rapid introduction of new and more efficient technologies, and a balance between fossil fuels and other energy sources.</div>";
				$count++;
				$left .= "<div id='var_$count'>leveling and declining emissions (<span>B1</span>)</div>";
				$right .= "<div id='desc_$count' style='display: none;'>The Intergovernmental Panel on Climate Change created a range of scenarios to explore alternative development pathways, covering a wide range of demographic, economic and technological driving forces and resulting greenhouse gas emissions. The B1 scenario describes a convergent world, with the same global population as A1B, but with more rapid changes in economic structures toward a service and information economy.</div>";
				$count++;
			echo "<script type='text/javascript'>globalScenario = '$addSce';</script>";
			?>
			<div class="menuContentsLeft"> <?php echo $left; ?> </div>
			<div class="menuContentsRight"> <?php echo $right; ?> </div>
		</div>
	</div>
	<div class='menuOption' id='menu_model'>
		<div>using the <span class="menuTitle" style="font-size: 10px;">
		<?php
			$addMod = "";
			if ($_GET['model']){
				$addMod = " ORDER BY FIELD(model, '".$_GET['model']."') DESC";
			}
			$subquery = "SELECT model FROM tileset WHERE variable='$activeVariable' GROUP BY model $addMod";
			$subresult = mysql_query($subquery) or die(mysql_error());
			$subrow = mysql_fetch_array($subresult);
			echo $subrow['model']; 
			echo "<script type='text/javascript'>globalModel = '".$subrow['model']."';</script>";
		?>
		</span></div>
		<div class='menuSpacer'></div>
		<div class='menuContents'>
			<?php
				$left = "";
				$right = "";
				$subquery = "SELECT model,description FROM tileset LEFT JOIN tileset_descriptions ON model=name WHERE variable='$activeVariable' GROUP BY model";
				$subresult = mysql_query($subquery) or die(mysql_error());
				while ($subrow = mysql_fetch_array($subresult)){
					$left .= "<div id='var_$count'><span>".$subrow['model']."</span></div>";
					$right .= "<div id='desc_$count' style='display: none;'>".$subrow['description']."</div>";
					$count++;
				}
			?>
			<div class="menuContentsLeft"> <?php echo $left; ?> </div>
			<div class="menuContentsRight"> <?php echo $right; ?> </div>
		</div>
	</div>
	<div class='menuOption' id='menu_resolution'>
		<div>downscaled to <span class="menuTitle" style="font-size: 10px;">
		<?php
			$addRes = "";
			if ($_GET['resolution']){
				$addRan = " ORDER BY FIELD(resolution, '".$_GET['resolution']."') DESC";
			}
			$subquery = "SELECT resolution FROM tileset WHERE variable='$activeVariable' GROUP BY resolution $addRes";
			$subresult = mysql_query($subquery) or die(mysql_error());
			$subrow = mysql_fetch_array($subresult);
			echo $subrow['resolution']; 
			echo "<script type='text/javascript'>globalResolution = '".$subrow['resolution']."'; </script>";
		?>
		</span> resolution</div>
		<div class='menuSpacer'></div>
		<div class='menuContents'>
			<?php
				$left = "";
				$right = "";
				$subquery = "SELECT resolution,description FROM tileset LEFT JOIN tileset_descriptions ON resolution=name WHERE variable='$activeVariable' GROUP BY resolution";
				$subresult = mysql_query($subquery) or die(mysql_error());
				while ($subrow = mysql_fetch_array($subresult)){
					$left .= "<div id='var_$count'><span>".$subrow['resolution']."</span></div>";
					$right .= "<div id='desc_$count' style='display: none;'>".$subrow['description']."</div>";
					$count++;
				}
			?>
			<div class="menuContentsLeft"> <?php echo $left; ?> </div>
			<div class="menuContentsRight"> <?php echo $right; ?> </div>
		</div>
	</div>

<script type="text/javascript">
	// On hover of the menu items, display the corresponding help text
	//alert(globalVariable + " : " + globalInterval + " : " + globalRange + " : " + globalScenario + " : " + globalModel + " : " + globalResolution);
	$(".menuContentsLeft > div").hover( 
		function() {
			var tmp = $(this).children("span").html();
			var num = $(this).attr("id").substring(4);
			$(this).parents('.menuContents').children(".menuContentsRight").children("#desc_" + num).show();
		},
		function() {
			$(this).parents('.menuContents').children(".menuContentsRight").children("div[id^='desc_']").hide();
		}
	);
	//On click on the variable, show the menu and options	
	$('#menu_variable').click( function() { showVariable(this); } );
	$('#menu_interval').click( function() { showVariable(this); } );
	$('#menu_range').click( function() { showVariable(this); } );
	$('#menu_scenario').click( function() { showVariable(this); } );
	$('#menu_model').click( function() { showVariable(this); } );
	$('#menu_resolution').click( function() { showVariable(this); } );
	$('.menuContentsLeft div').click( function() {
		$(this).parents(".menuOption").find(".menuTitle").html($(this).html());
		addMap(this, $(this).children("span").html());
		if ($(this).parents(".menuOption").attr("id") == "menu_variable"){
			buildMenu($(this).children("span").html());
		}
		updateMenu();
	});
</script>

<?php
}
elseif ($_GET['requesttype'] == "newmap"){
	$variable = mysql_real_escape_string($_GET['variable']);
	$interval = mysql_real_escape_string($_GET['interval']);
	$range = mysql_real_escape_string($_GET['range']);
	$scenario = mysql_real_escape_string($_GET['scenario']);
	$model = mysql_real_escape_string($_GET['model']);
	$resolution = mysql_real_escape_string($_GET['resolution']);
	$query = "SELECT tilepath FROM tileset WHERE variable='$variable' AND dateinterval='$interval' AND daterange='$range' AND scenario='$scenario' AND model='$model' AND resolution='$resolution'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	echo $row['tilepath'];
}
?>
