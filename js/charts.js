
// Prepare some functionality when page has loaded
$( function() {
	snapCharts.initialize();
});

// Encapsulate the AJAX functionality
var snapCharts = {

	chart: null, // is defined when the chart is drawn
	data: {}, // populated by ajax call and/or decomposing the URL.

	// Intended to be called on page ready() event
	initialize : function() {

		// Flush default CSS to restyle jQuery blockUI content
		$.blockUI.defaults.css = {};
		$.blockUI.defaults.overlayCSS = {
			marginTop: '-20px', // force the box to expand to fill the entire region
			paddingBottom: '40px', // force the box to expand to fill the entire region
			backgroundColor: '#000',
			opacity: 0.2
		};

		// Display a "Loading..." spinner when an AJAX call is in progress over a chart
		$('#display').ajaxStart(function() {
			$(this).block( {'message':'<img src="images/ajax-loader.gif" alt="" />&nbsp;Loading&hellip;'} );
		}).ajaxStop( function() {
			$(this).unblock();
		});		
	},

	fetchData : function (comm, type, scen, vari) {
		$.get(

			"charts_fetch_data.php", 
			{ 
				community : comm, 
				dataset: type, 
				scenario : scen, 
				variability: vari 
			},
			function(data) {
				snapCharts.data = data;
				snapCharts.drawChart();
				$('#location').html(": " + globalCommunity);
				$('#comm_block').hide();
				$('#export_options').show();
				$('#link_field').val("http://dev.snap.uaf.edu/charts.php?community=" + globalCommunity + "&amp;dataset=" + globalDataset + "&amp;scenario=" + globalScenario + "&amp;variability=" + globalVariability);
			}
			
		);
	},

	drawChart: function() {

		if(1 === snapCharts.data.dataset) {
			Highcharts.setOptions({ colors: ['#00b2ee', '#308014', '#999999', '#ffff00', '#999999', '#ff7f00', '#999999', '#cc1100', '#999999'] });
		} else {
			Highcharts.setOptions({ colors: ['#97ffff', '#00ffff', '#999999', '#00b2ee', '#999999', '#007ca7', '#999999', '#0045b3', '#999999'] });
		}

		snapCharts.chart = new Highcharts.Chart({
			
			chart: {
				height: 400,
				border: '#fff',
				renderTo: 'chart_div',
				defaultSeriesType: 'column',
				margin: [100,30,70,50]
			},
			
			tooltip: {
				formatter: function() {
					if( 1 === snapCharts.data.dataset ) {
						return '<span style="color: #999999;">' + this.x + ' </span><br/><span>' + this.y + ' &deg;F (' + ((5/9) * (this.y - 32)).toFixed(1) + ' &deg;C)</span>';
					} else {
						return '<span style="color: #999999;">' + this.x + ' </span><br/><span>' + this.y + ' in. (' + (this.y * 25.4).toFixed(1) + ' mm.)</span>';
					}
				}
			},
			
			credits: {
				enabled: true,
				href: '',
				position: { 
					y: -35, 
					x: 10, 
					align: 'center'
				},
				style: {
					width: '800px',
					height: '50px'
				},
				text: 'This graph shows average values from projections from five global models used by the Intergovernmental Panel on Climate Change.  Due to variability among models and among years in a natural climate system, such graphs are useful for examining trends over time, rather than for precisely predicting monthly or yearly values.  For more information on the SNAP program, including derivation, reliability, and variability among these projections, please visit www.snap.uaf.edu.'
			},
			
			legend: {
				verticalAlign: top,
				y: 40
			},
			
			plotOptions: {
				column: {
					pointPadding: 0.05,
					borderWidth: 0,
					shadow: false,
					animation: false,
					groupPadding: 0.1,
					events: {
						legendItemClick: false
					}
				}
			},
			
			title: {
				y: 10,
				text: snapCharts.data.title
			},

			subtitle: {
				y: 30,
				text: snapCharts.data.subtitle
			},

			xAxis: {
				categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
			},

			yAxis: {
				min: snapCharts.data.minimum,
				max: snapCharts.data.maximum,
				// plotBands: belongs here
				title: snapCharts.data.yAxisTitle,
				labels: {
					enabled: true
				}
			},

			exporting: {
				enabled: true,
				url: './exporting-server/',
				buttons: {
					exportButton: {
						enabled: false
					},
					printButton: {
						enabled: false
					}
				}
			},
			series: [
				{
					name: '1961-1990',
					data: snapCharts.data.series['1961-1990']
				},
				{
					name: '2001-2010',
					data: snapCharts.data.series['2001-2010']
				},
				{
					name: '2031-2040',
					data: snapCharts.data.series['2031-2040']
				},
				{
					name: '2061-2070',
					data: snapCharts.data.series['2061-2070']
				},
				{
					name: '2091-2100',
					data: snapCharts.data.series['2091-2100']
				}
			]
		},  function(chart) {

			if( 1 === snapCharts.data.variability ) {

				var extremes = chart.yAxis[0].getExtremes();
				var multiplier = chart.plotHeight / (extremes.max - extremes.min);
				
				for( i = 1; i < chart.series.length; i += 2 ) {
					for (j = 0; j < chart.series[i].data.length; j++) {

						var x = chart.series[i].data[j].plotX + 32 + i * 5.75;
						var y = chart.series[i].data[j].plotY+100;
						var y1 = chart.series[i].data[j].plotY+100 - chart.series[i+1].data[j].y * multiplier;
						var y2 = chart.series[i].data[j].plotY+100 + chart.series[i+1].data[j].y * multiplier;
						
						var liney1 = chart.renderer.path(
							['M', x, y, 'L', x, y, x, y1]
						).attr(
							{
								strokeWidth: 1,
								zIndex: 5,
								stroke: 'Black'
							}
						).add();

						var linex1 = chart.renderer.path( 
							[ 'M', x, y1, 'L', x-2, y1, x+2, y1 ]
						).attr(
							{
							strokeWidth: 1,
							zIndex: 5,
							stroke: 'Black'
							}
						).add();

						var liney2 = chart.renderer.path(
							[ 'M', x, y, 'L', x, y, x, y2 ]
						).attr(
							{
								strokeWidth: 1,
								zIndex: 5,
								stroke: 'Black'
							}
						).add();
				
						var linex2 = chart.renderer.path(
							[ 'M', x, y2, 'L', x-2, y2, x+2, y2]
						).attr(
							{
								strokeWidth: 1,
								zIndex: 5,
								stroke: 'Black'
							}
						).add();
					}
				}
            }
        });
	}
};