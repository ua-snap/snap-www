<?php
	$server = "localhost";
	$username = "snapwww_admin";
	$password = "xargX11";
	$database = "snapwww";
	mysql_connect($server, $username, $password) or die("Unable to Connect to Database");
	mysql_select_db($database);	

if ($_GET['fetch_type'] == "chart"){
	$comm = preg_replace("/-/", " ", $_GET['community']);
    echo "<script type=\"text/javascript\">";
	echo "var chart;";
	echo "globalCommunity = '".$_GET['community']."';";
	echo "globalDataset = '".$_GET['dataset']."';";
	echo "globalScenario = '".$_GET['scenario']."';";
	echo "globalVariability = '".$_GET['variability']."';";
      echo "function drawChart() { ";
	if ($_GET['dataset'] == 1){
		echo "Highcharts.setOptions({ colors: ['#00b2ee', '#308014', '#999999', '#ffff00', '#999999', '#ff7f00', '#999999', '#cc1100', '#999999'] });";
	} elseif ($_GET['dataset'] == 2) {
		echo "Highcharts.setOptions({ colors: ['#97ffff', '#00ffff', '#999999', '#00b2ee', '#999999', '#007ca7', '#999999', '#0045b3', '#999999'] });";

	}
	echo "chart = new Highcharts.Chart({";
		echo "chart: {";
			echo "height: '400',";
			echo "renderTo: 'chart_div',";
			echo "defaultSeriesType: 'column',";
			//echo "plotBackgroundImage: 'http://dev.snap.uaf.edu/images/snap_chart_bg.png',";
			echo "margin: [100,30,70,50]";

		echo "},";
		echo "tooltip: {";
			echo "formatter: function() {";
				if ($_GET['dataset'] == 1){
				echo "var str = '<span style=\"color: #999999;\">' + this.x + ' </span><br/>' + '<span>' + this.y + ' °F (' + ((5/9) * (this.y - 32)).toFixed(1) + ' °C)</span>';";
				}
				if ($_GET['dataset'] == 2){
					echo "var str = '<span style=\"color: #999999;\">' + this.x + ' </span><br/>' + '<span>' + this.y + ' in. (' + (this.y * 25.4).toFixed(1) + ' mm.)</span>';";
				}
				
				echo "return str;
			}"; 
		echo "},";
		echo "credits: {";
			echo "enabled: true, ";
			echo "href: '',";
			echo "position: { y: -35, x: 10, align: 'center' },";
			echo "style: {";
				//echo "itemStyle: {";
					echo "width: '800px',";
					echo "height: '50px',";
				//echo "}";
			echo "}, ";
			echo "text: 'This graph shows average values from projections from five global models used by the Intergovernmental Panel on Climate Change.  Due to variability among models and among years in a natural climate system, such graphs are useful for examining trends over time, rather than for precisely predicting monthly or yearly values.  For more information on the SNAP program, including derivation, reliability, and variability among these projections, please visit www.snap.uaf.edu.'";
		echo "},";
		echo "legend: {";
			echo "verticalAlign: top,";
			echo "y: 40";
		echo "},";
		echo "plotOptions: {";

			echo "column: {";
				echo "pointPadding: 0.05,";
				echo "borderWidth: 0,";
				echo "shadow: false,";
				echo "animation: false,";
				echo "groupPadding: 0.1,";
				echo "events: {";
					echo "legendItemClick: false";
				echo "}";
			echo "}";
		echo "},";
		echo "title: {";
			echo "y: 10,";
			if ($_GET['dataset'] == 1){
				echo "text: 'Historical and Projected Average Monthly Temperature for ".$comm."'";
			}
			if ($_GET['dataset'] == 2){
				echo "text: 'Historical and Projected Average Monthly Precipitation for ".$comm."'";
			}
		echo "},";
		echo "subtitle: {
			y: 30,";
			if ($_GET['scenario'] == 'B1'){
				echo "text: 'Low-range emissions (B1)'";
			}
			if ($_GET['scenario'] == 'A1B'){
				echo "text: 'Mid-range emissions (A1B)'";
			}
			if ($_GET['scenario'] == 'A2'){
				echo "text: 'High-range emissions (A2)'";
			}
		echo "},";
		echo "xAxis: {";
			echo "categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']";

		echo "},";
		echo "yAxis: {";

			if ($_GET['dataset'] == 1){	
				$query = "SELECT max(value),min(value) FROM community_charts WHERE community LIKE '$comm' AND type='1'";
				$result = mysql_query($query);
				$row = mysql_fetch_array($result);
				echo "min: ".floor($row['min(value)']).",";
				echo "max: ".ceil($row['max(value)']).",";
				//echo "plotLines: [{ value: 32, color: '#000000', width: 1.5 }],";
				echo "plotBands: [{ value: 32, color: '#000000', width: 1.5, label: { text: '32°', align: 'right', style: { fontSize: '10px' } } }],";
			}
			if ($_GET['dataset'] == 2){
				$query = "SELECT max(value),min(value) FROM community_charts WHERE community LIKE '$comm' AND type='2'";
				$result = mysql_query($query);
				$row = mysql_fetch_array($result);
				echo "min: ".floor($row['min(value)']).",";
				echo "max: ".ceil($row['max(value)']).",";
			}
			echo "title: {";
				if ($_GET['dataset'] == 1){
					echo "text: 'Temperature (°F)'";	
				}
				if ($_GET['dataset'] == 2){
					echo "text: 'Precipitation (inches)'";	
				}
			echo "}";
			echo ", labels: { enabled: true }";
		echo "},";
		echo "exporting: {";
			echo "url: './exporting-server/',";
			//echo "enableImages: true,";
			echo "enabled: true,";
			echo "buttons: {";
				echo "exportButton: {";
					echo "enabled: false";
				echo "},";
				echo "printButton: {";
					echo "enabled: false";
				echo "}";
			echo "}";
		echo "},";
		echo "series: [{";
			//echo "name: '1961-1990 historical', ";
			echo "name: '1961-1990', ";
			$query = "SELECT * FROM community_charts WHERE community LIKE '$comm' AND type='".$_GET['dataset']."' AND scenario='".$_GET['scenario']."' AND daterange = '1961-1990' ORDER BY FIELD(month, 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec')";
			$result = mysql_query($query);
			$error = mysql_error();
			echo "data: [";
			for ($i = 0; $i < 12; $i++){
				$row = mysql_fetch_array($result);
				echo $row['value'];
				if ($i < 11){
					echo ", ";
				}
			}
			echo "]";
		echo "}";
		$ranges = array("2001-2010", "2031-2040", "2061-2070", "2091-2100");
		for ($i = 0; $i < sizeof($ranges); $i++){
			echo ",{";
				//echo "name: '".$ranges[$i]." modeled', ";
				echo "name: '".$ranges[$i]."', ";
				echo "data: [";
				//Prevent STD DEV from showing in legend or on chart
				$stddev = ", {name: 'STDDDEV', visible: false, showInLegend: false, data: [";
				$query = "SELECT * FROM community_charts WHERE community LIKE '$comm' AND type='".$_GET['dataset']."' AND scenario='".$_GET['scenario']."' AND daterange = '".$ranges[$i]."' ORDER BY FIELD(month, 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec')";
				$result = mysql_query($query);
				for ($j = 0; $j < 12; $j++){
					$row = mysql_fetch_array($result);
					echo $row['value'];
					$stddev .= $row['stddev'];
					if ($j < 11){
						echo ", ";
						$stddev .= ", ";
					}
				}

				echo "]}";
				$stddev .= "]}";
				echo $stddev;
		}
		echo "]";
		echo "}";

			//Multiple of *3 in chart plot is used for specific height chart.  It will need to be manually adjusted if chart height changes from 400
			echo ", function (chart){";

				//echo "chart.renderer.path(['M', 0,Origin, 'L',50,50, 100, 100]).attr({ strokeWidth: 10, zIndex: 100, stroke: 'Black' }).add(); ";
				//chart.renderer.image('http://dev.snap.uaf.edu/images/snap_acronym_rgb.png', 0, 0, 150, 45).add();";

				if ($_GET['variability'] == 1){
				echo "var extremes = chart.yAxis[0].getExtremes();";
				echo "var multiplier = chart.plotHeight / (extremes.max - extremes.min);";
				echo "for (i = 1; i < chart.series.length; i = i+2){
					for (j = 0; j < chart.series[i].data.length; j++){
					    var x = chart.series[i].data[j].plotX + 32 + i * 5.75;
					var y = chart.series[i].data[j].plotY+100;
					var y1 = chart.series[i].data[j].plotY+100 - chart.series[i+1].data[j].y * multiplier;
					var y2 = chart.series[i].data[j].plotY+100 + chart.series[i+1].data[j].y * multiplier;
					var liney1 = chart.renderer
					.path(['M', x,y, 'L',x,y,x,y1])
					.attr({
					strokeWidth: 1,
					zIndex: 5,
					stroke: 'Black'
					}).add();
					var linex1 = chart.renderer
					.path(['M', x,y1, 'L',x-2,y1,x+2,y1])
					.attr({
					strokeWidth: 1,
					zIndex: 5,
					stroke: 'Black'
					}).add();
					var liney2 = chart.renderer
					.path(['M', x,y, 'L',x,y,x,y2])
					.attr({
					strokeWidth: 1,
					zIndex: 5,
					stroke: 'Black'
					}).add();
					var linex2 = chart.renderer
					.path(['M', x,y2, 'L',x-2,y2,x+2,y2])
					.attr({
					strokeWidth: 1,
					zIndex: 5,
					stroke: 'Black'
					}).add();
					}
					}";
				}
			echo "}";

	echo "); ";	
      echo "}";

	//echo "alert(globalCommunity + ' ' + globalDataset + ' ' + globalScenario + ' ' + globalVariability);";
    echo "</script>";
    echo "<div style=\"width: 930px; height: 420px; margin-left: 20px;\" id=\"chart_div\"></div>";
	echo "<script type=\"text/javascript\">";
		echo "$('#export_button').click(function() { 
			chart.exportChart(null, { 
				chart: { 
					backgroundColor: '#eeffff' 
				}
			}, 
			function (chart){
				chart.renderer.image('http://dev.snap.uaf.edu/images/snap_acronym_rgb.png', 0, 0, 150, 45).add();
				chart.renderer.image('http://dev.snap.uaf.edu/images/snap_acronym_rgb.png', 0, 0, 150, 45).add();
			});
		 });";
		//echo "$('#export_button').click(function() { chart.exportChart(null, { chart: { backgroundColor: '#0099ff' }, function (chart){ chart.renderer.image('http://dev.snap.uaf.edu/images/snap_acronym_rgb.png', 0, 0, 150, 45).add(); } });  } );";
	echo "</script>";
	//echo "STORE".$storeval;
} 
if ($_GET['fetch_type'] == "comm_name"){
	$comm_name = $_GET['comm_name'];
	$query = "SELECT id,community FROM community_charts WHERE community LIKE '".$comm_name."%' GROUP BY community";
	$result = mysql_query($query);
	$community_list = "";
	$community_script = "";
	while ($row = mysql_fetch_array($result)){
		$comm = preg_replace("/\s/", "-", $row['community']);
		$community_list .= "<div><a style=\"cursor: hand; cursor: pointer;\" id=\"$comm\">".$row['community']."</a></div>";
		$community_script .= "$('#".$comm."').click( function() { fetchData('$comm', globalDataset, globalScenario, globalVariability, 'chart'); } );";
	}
	echo $community_list;
	echo "<script type=\"text/javascript\">$community_script</script>";
}

?>
