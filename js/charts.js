
// Prepare some functionality when page has loaded
$( function() {

	snapCharts.initialize();
	$(window).bind( 'hashchange', function(e) {
		snapCharts.fetchData();
	});
});

// Encapsulate the AJAX functionality
window.snapCharts = {

	chart: null, // is defined when the chart is drawn

	data: {
		communityId: null,
		communityName: null,
		region: null, // Alaska, Manitoba, etc
		country: null, // USA or CAN
		scenario: 'a1b',
		variability: 0,
		dataset: 1, // default temperature
		series: null, // actual data, keys are time spans
		standardDeviations: null, // keys are time spans
		yAxisTitle: null,
		title: null,
		subtitle: null
	},

	// Intended to be called on page ready() event
	initialize : function() {

		var params = $.bbq.getState(true); // perform type coercion

		window.snapCharts.data.communityId = params.communityId || null;
		window.snapCharts.data.communityId = params.scenario || null;
		window.snapCharts.data.communityId = params.variability || null;
		window.snapCharts.data.communityId = params.dataset || null;

		window.snapCharts.fetchData();

/* bypass the loading()... to see how it works

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

		*/
	},

	changeParams : function() {
		$.bbq.pushState({
			community : snapCharts.data.communityId,
			dataset: snapCharts.data.dataset,
			scenario : snapCharts.data.scenario,
			variability: snapCharts.data.variability
		});
	},

	fetchData : function() {

		//PICKUP.  this is _working_ but it's not working _well_ because it's not working :p
		// Only fetch the data if there are meaningful parameters to sent.  Otherwise, ignore.
		if(
			false === _.isNull(snapCharts.data.communityId) &&
			_.isNumber(snapCharts.data.dataset) &&
			_.isString(snapCharts.data.scenario)
		) {

			$.get(
				"charts_fetch_data.php",
				{
					community : snapCharts.data.communityId,
					dataset: snapCharts.data.dataset,
					scenario : snapCharts.data.scenario,
					variability: snapCharts.data.variability
				},

				function(data) {
					snapCharts.data = data;
					snapCharts.drawChart();
					$('#placeholderImage').remove();
					$('#location').html(": " + snapCharts.data.communityName + ', ' + snapCharts.data.communityRegion);
					$('#comm_block').hide();
					$('#export_options').show();
					$('#link_field').val(snapConfig.url + "/charts.php?community=" + snapCharts.data.communityId + "&amp;dataset=" + snapCharts.data.dataset + "&amp;scenario=" + snapCharts.data.scenario + "&amp;variability=" + snapCharts.data.variability);
				},
				'json'
			);

		} else {
			console.log('I did not think I should fetch the data.');
			console.log(snapCharts.data);
		}
	},

	drawChart: function() {
		
		if( _.isUndefined(snapCharts.data.series)) {
			alert('Sorry, an error occurred, and the chart could not be loaded.');
			window.location.assign(snapConfig.url);
		}

		if(1 === snapCharts.data.dataset) {
			Highcharts.setOptions({ colors: ['#00b2ee', '#308014', '#999999', '#ffff00', '#999999', '#ff7f00', '#999999', '#cc1100', '#999999'] });
		} else {
			Highcharts.setOptions({ colors: ['#97ffff', '#00ffff', '#999999', '#00b2ee', '#999999', '#007ca7', '#999999', '#0045b3', '#999999'] });
		}

		snapCharts.chart = new Highcharts.Chart({
			
			chart: {
				height: 400,
				border: '#ffffff',
				renderTo: 'chart_div',
				defaultSeriesType: 'column',
				margin: [100,30,70,50]
			},
			
			tooltip: {
				formatter: function() {
					if( 1 === snapCharts.data.dataset ) {
						return '<span style="color: #999999;">' + this.x + ' </span><br/><span>' + this.y + ' °F (' + ((5/9) * (this.y - 32)).toFixed(1) + ' °C)</span>';
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
				// only for temp -- need to remove for precip
				plotBands: [
					{
						value: 32,
						color: '#000000',
						width: 1.5,
						label: {
							text: '32°',
							align: 'right',
							style: {
								fontSize: '10px'
							}
						}
					}
				],
				title: {
					text: snapCharts.data.yAxisTitle
				},
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
					name: 'Historical',
					data: snapCharts.data.series.Historical
				},
				{
					name: '2011-2020',
					data: snapCharts.data.series['2011-2020']
				},
				{
					name: '2011-2020 Standard Deviations',
					visible: false,
					showInLegend: false,
					data: snapCharts.data.standardDeviations['2011-2020']
				},
				{
					name: '2041-2050',
					data: snapCharts.data.series['2031-2040']
				},
				{
					name: '2041-2050 Standard Deviations',
					visible: false,
					showInLegend: false,
					data: snapCharts.data.standardDeviations['2041-2050']
				},
				{
					name: '2061-2070',
					data: snapCharts.data.series['2061-2070']
				},
				{
					name: '2061-2070 Standard Deviations',
					visible: false,
					showInLegend: false,
					data: snapCharts.data.standardDeviations['2061-2070']
				},
				{
					name: '2091-2100',
					data: snapCharts.data.series['2091-2100']
				},
				{
					name: '2091-2100 Standard Deviations',
					visible: false,
					showInLegend: false,
					data: snapCharts.data.standardDeviations['2091-2100']
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