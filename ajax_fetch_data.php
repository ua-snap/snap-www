<?php
	$server = "localhost";
	$username = "snapwww_admin";
	$password = "xargX11";
	$database = "snapwww";
	mysql_connect($server, $username, $password) or die("Unable to Connect to Database");
	mysql_select_db($database);	

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
			echo "margin: [100,30,70,50]";
		echo "},";

		echo "credits: {";
			echo "enabled: true, ";
			echo "position: { y: -35, x: 10, align: 'left' },";
			echo "style: {";
				//echo "itemStyle: {";
					echo "width: '890px',";
					echo "height: '50px',";
				//echo "}";
			echo "}, ";
			echo "text: 'This graph shows average values from projections from five global models used by the Intergovernmental Panel on Climate Change.  Due to variability among models and among years in a natural climate system, such graphs are useful for examining trends over time, rather than for precisely predicting monthly or yearly values.  For more information on the SNAP program, including derivation, reliability, and variability among these projections, please visit www.snap.uaf.edu.'";
		echo "},";
		echo "legend: {";
			echo "verticalAlign: top,";
			echo "y: 40";
		echo "},";
		echo "labels: {
			items: [{
				html: '<img src=\"http://dev.snap.uaf.edu/images/snap_acronym_rgb.png\" />',
				style: {
					left: 50,
					top: 50
				}
			}]
		},";
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
			echo "text: 'Historical and Projected Average Monthly Temperature for ".$comm."'";
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
			echo "title: {";
				if ($_GET['dataset'] == 1){
					echo "text: 'Temperature (°F)'";	
				}
				if ($_GET['dataset'] == 2){
					echo "text: 'Precipitation (inches)'";	
				}
			echo "}";
		echo "},";
		echo "exporting: {";
			echo "url: '/exporting-server/',";
			echo "buttons: {";
				echo "exportButton: {";
					echo "onclick: function (chart){
						alert('g');
						}";

				echo "}";
			echo "}";
		echo "},";
		echo "series: [{";
			echo "name: '1961-1990 historical', ";
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
				echo "name: '".$ranges[$i]." modeled', ";
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
			echo ", function (chart){
				chart.renderer.image('http://dev.snap.uaf.edu/images/snap_acronym_rgb.png', 0, 0, 150, 45).add();";
				if ($_GET['variability'] == 1){
				echo "for (i = 1; i < chart.series.length; i = i+2){
					for (j = 0; j < chart.series[i].data.length; j++){
					    var x = chart.series[i].data[j].plotX + 32 + i * 5.75;
					var y = chart.series[i].data[j].plotY+100;
					var y1 = chart.series[i].data[j].plotY+100 - chart.series[i+1].data[j].y * 3;
					var y2 = chart.series[i].data[j].plotY+100 + chart.series[i+1].data[j].y * 3;
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
    echo "<div><button id=\"export_button\">Export</button></div>";
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
?>
