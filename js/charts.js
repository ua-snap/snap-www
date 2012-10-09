/*jshint: laxbreak:true */

// todo: move this (and other common reuse) up into a mixins file
// Mix in ability to toggle disabled form fields with jQuery
(function($) {
    $.fn.toggleDisabled = function(){
        return this.each(function(){
            this.disabled = !this.disabled;
        });
    };
})(jQuery);

// Prepare some functionality when page has loaded
$( function() {
	
	$('#variable_selections input[type="radio"]').change( function(e) {
		window.snapCharts.data[ $(e.currentTarget).attr('name') ] = $(e.currentTarget).val();
		window.snapCharts.changeParams();
	});

	$('#dataset_help').button({
		text: false,
		icons: {
			primary: 'ui-icon-help'
		}
	}).click(function(e) {
		$('#about_scenarios').show().dialog({
			draggable: false,
			modal: true,
			title: 'About scenarios',
			resizable: false,
			show: 'fade',
			hide: 'fade',
			width: '700px',
			zindex: 50000,
			buttons: {
				'Close': function(e) {
					$(this).dialog('close');
				}
			}
		});
	});

	$('#variability_help').button({
		text: false,
		icons: {
			primary: 'ui-icon-help'
		}
	}).click(function(e) {
		$('#about_variability').show().dialog({
			draggable: false,
			modal: true,
			title: 'About Inter-Model Variability',
			resizable: false,
			show: 'fade',
			hide: 'fade',
			width: '700px',
			zindex: 50000,
			buttons: {
				'Close': function(e) {
					$(this).dialog('close');
				}
			}
		});
	});

	// Initialize the button for the export modal
	$('#export_options').button({
		icons: {
			primary: 'ui-icon-print'
		}
	}).click(
		function(e) {
			$('#exportDialog').show().dialog({
				draggable: false,
				modal: true,
				title: 'Export chart for '+window.snapCharts.data.communityName + ', '+window.snapCharts.data.communityRegion,
				resizable: false,
				show: 'fade',
				hide: 'fade',
				width: '700px',
				zindex: 50000,
				buttons: {
					'Close': function(e) {
						$(this).dialog('close');
					}
				}
			});

			$('#export_link').select();
			$('#export_hires_png').button().click( function(e) {
				$('#exportDialog').dialog('close');
				$('#processingExportDialog').show().dialog({
					draggable: false,
					modal: true,
					title: 'Processing image export&hellip;',
					resizable: false,
					show: 'fade',
					hide: 'fade',
					width: '700px',
					zindex: 50000,
					buttons: {
						'OK': function(e) {
							$(this).dialog('close');
						}
					}
				});
				window.snapCharts.exportChart('png/hires');
			});
			$('#export_lowres_png').button().click( function(e) {
				window.snapCharts.exportChart('png/lowres');
			});
			$('#export_svg').button().click( function(e) {
				window.snapCharts.exportChart('svg');
			});

		}
	).hide();

	window.snapCharts.initialize();
	window.snapCharts.refreshState();
	window.snapCharts.fetchData();

});

// Encapsulate the AJAX functionality
window.snapCharts = {

	chart: null, // is defined when the chart is drawn

	data: {
		community: null, // id#
		communityName: null,
		region: null, // Alaska, Manitoba, etc
		country: null, // USA or CAN
		scenario: 'a1b', // string, 'a1b','b1','a2'
		variability: 0, // default 0=off, 1=on
		dataset: 1, // default temperature =1, precip=2
		series: null, // actual data, keys are time spans
		standardDeviations: null, // keys are time spans
		yAxisTitle: null,
		title: null,
		subtitle: null
	},

	// Intended to be called on page ready() event
	initialize : function() {

		$('#comm_select').focus().autocomplete(
			{
				source: function(req, responseFn) {
					var re = $.ui.autocomplete.escapeRegex(req.term);
					var matcher = new RegExp( "^" + re, "i" );
					var a = $.grep( window.snapCharts.communities, function(item,index){
						return matcher.test(item.label);
					});
					responseFn( a );
				}
			}
		).bind('autocompletechange', function(event, ui) {
			if( false === _.isUndefined(ui.item) ) {
				$('#comm_select').val(ui.item.label);
				$('#comm_select_id').val(ui.item.value);
				window.snapCharts.data.community = ui.item.value;
			}
		}).bind('autocompletefocus', function(event, ui) {
			if( false === _.isUndefined(ui.item) ) {
				event.preventDefault();
				$('#comm_select').val(ui.item.label);
				$('#comm_select_id').val(ui.item.value);
				window.snapCharts.data.community = ui.item.value;
			}
		}).bind('autocompleteselect', function(event, ui) {
			event.preventDefault();
			$('#comm_select').val(ui.item.label);
			$('#comm_select_id').val(ui.item.value);
			window.snapCharts.data.community = ui.item.value;
			window.snapCharts.changeParams();
		}).keypress(function(e) {
			// if the enter key is pressed, try and search if there's a valid community id.
			if( 13 === e.which ) {
				if( false === _.isNull( window.snapCharts.data.community )) {
					window.snapCharts.data.community = $('#comm_select_id').val();
					snapCharts.changeParams();
				}
			}
		});

		$(window).bind( 'hashchange', function(e) {
			snapCharts.refreshState();
			snapCharts.fetchData();
		});

		// Flush default CSS to restyle jQuery blockUI content
		$.blockUI.defaults.css = {};
		$.blockUI.defaults.overlayCSS = {
			marginTop: '-20px', // force the box to expand to fill the entire region
			paddingBottom: '40px', // force the box to expand to fill the entire region
			backgroundColor: '#000',
			opacity: 0.2
		};

		$('#variable_selections .buttonset').buttonset();

	},

	// Prepare the chart for export.  The `type` parameter is expected to be a mime-type.
	exportChart: function(type) {

		window.snapCharts.refreshState();
		window.snapCharts.chart.exportChart({
			type: type
		});

	},

	// Examine the hashtags to rebuild the correct query parameters.  It's expected
	// that this will be called when the user changes parameters, or when the user
	// deep-links to this page, or when the user uses back/forward buttons in the browser.
	refreshState: function() {

		var params = $.bbq.getState(true); // perform type coercion

		window.snapCharts.data.community = params.community || null;
		window.snapCharts.data.scenario = params.scenario || 'a1b'; // default scenario a1b
		window.snapCharts.data.variability = params.variability || 0; // default no variability
		window.snapCharts.data.dataset = params.dataset || 1; // default temp

		$('#variable_buttons input[value="' + window.snapCharts.data.dataset + '"]').prop('checked', 'checked').button('refresh');
		$('#scenario_buttons input[value="' + window.snapCharts.data.scenario + '"]').prop('checked', 'checked').button('refresh');
		$('#variability_buttons input[value="' + window.snapCharts.data.variability + '"]').prop('checked', 'checked').button('refresh');

		// Flash for the user if no community is selected, and lock out the
		// controls for changing parameters.
		if( null === window.snapCharts.data.community) {
			$('#comm_select_wrapper').effect('highlight', {}, 3000);
			$('#variable_buttons').buttonset('disable');
			$('#scenario_buttons').buttonset('disable');
			$('#variability_buttons').buttonset('disable');
			$('#dataset_help').button('disable');
			$('#variability_help').button('disable');
		} else {
			// Ensure the controls are enabled if there is a community
			$('#variable_buttons').buttonset('enable');
			$('#scenario_buttons').buttonset('enable');
			$('#variability_buttons').buttonset('enable');
			$('#dataset_help').button('enable');
			$('#variability_help').button('enable');
		}

	},

	// Should be called when values change that need to update the hashtag.
	changeParams : function() {
		
		$.scrollTo('#chartsTitle', 400, { offset: -10, axis:'y' });

		$.bbq.pushState({
			community : snapCharts.data.community,
			dataset: snapCharts.data.dataset,
			scenario : snapCharts.data.scenario,
			variability: snapCharts.data.variability
		});
	},

	fetchData : function() {

		window.snapCharts.refreshState();

		// Only fetch the data if there are meaningful parameters to send.  Otherwise, ignore.
		if(
			false === _.isNull(snapCharts.data.community) &&
			_.isNumber(snapCharts.data.dataset) &&
			_.isString(snapCharts.data.scenario)
		) {

			$.get(
				"charts_fetch_data.php",
				{
					community : snapCharts.data.community,
					dataset: snapCharts.data.dataset,
					scenario : snapCharts.data.scenario,
					variability: snapCharts.data.variability
				},

				function(data) {
					snapCharts.data = data;
					snapCharts.drawChart();
					$('#placeholderImage').remove();
					$('#location').html(": " + snapCharts.data.communityName + ', ' + snapCharts.data.communityRegion);
					$('#comm_select').val(snapCharts.data.communityName + ', ' + snapCharts.data.communityRegion);
					$('#comm_block').hide();
					$('#export_options').show();
					$('#export_link').val(window.location.href);
				},
				'json'
			);

		} else {
			// don't care.  this is the default case, i.e. no params chosen or present in the hashtags.
		}
	},

	drawChart: function() {

		if( _.isUndefined(snapCharts.data.series)) {
			alert('Sorry, an error occurred, and the chart could not be loaded.');
			window.location.assign(snapConfig.url);
		}

		if(1 === snapCharts.data.dataset) {
			Highcharts.setOptions({ colors: ['#999999', '#308014', '#999999', '#ffff00', '#999999', '#ff7f00', '#999999', '#cc1100', '#999999'] });
		} else {
			Highcharts.setOptions({ colors: ['#999999', '#00ffff', '#999999', '#00b2ee', '#999999', '#007ca7', '#999999', '#0045b3', '#999999'] });
		}

		snapCharts.chart = new Highcharts.Chart({
			
			chart: {
				height: 400,
				border: 'none',
				renderTo: 'chart_div',
				defaultSeriesType: 'column',
				margin: [100,30,70,50]
			},

			tooltip: {
				formatter: function() {
					if( 1 === snapCharts.data.dataset ) {
						return '<span style="color: #999;">' + this.x + ' </span><br/><span>' + this.y + ' °F (' + ((5/9) * (this.y - 32)).toFixed(1) + ' °C)</span>';
					} else {
						return '<span style="color: #999;">' + this.x + ' </span><br/><span>' + this.y + ' in (' + (this.y * 25.4).toFixed(1) + ' mm)</span>';
					}
				}
			},
			
			credits: {
				enabled: true,
				href: '',
				position: {
					y: -35,
					x: 0,
					align: 'center'
				},
				style: {
					'fontSize' : '9px',
					'width': '750px',
					'padding': '10px'
				},
				text: 'Due to variability among climate models and among years in a natural climate system, these graphs are useful for examining trends over time, rather than for precisely predicting monthly or yearly values. For more information on derivation, reliability, and variability among these projections, please visit www.snap.uaf.edu.'
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
						color: '#000',
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
				url: './charts_export.php',
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
					data: snapCharts.data.series.Historical
				},
				{
					name: '2010-2019',
					data: snapCharts.data.series['2011-2020']
				},
				{
					name: '2010-2019 Standard Deviations',
					visible: false,
					showInLegend: false,
					data: snapCharts.data.standardDeviations['2011-2020']
				},
				{
					name: '2040-2049',
					data: snapCharts.data.series['2031-2040']
				},
				{
					name: '2040-2049 Standard Deviations',
					visible: false,
					showInLegend: false,
					data: snapCharts.data.standardDeviations['2041-2050']
				},
				{
					name: '2060-2069',
					data: snapCharts.data.series['2061-2070']
				},
				{
					name: '2060-2069 Standard Deviations',
					visible: false,
					showInLegend: false,
					data: snapCharts.data.standardDeviations['2061-2070']
				},
				{
					name: '2090-2099',
					data: snapCharts.data.series['2091-2100']
				},
				{
					name: '2090-2099 Standard Deviations',
					visible: false,
					showInLegend: false,
					data: snapCharts.data.standardDeviations['2091-2100']
				}
			]
		},  function(chart) {
			window.snapCharts.customChartsRenderer(chart);
        });
	}
};

window.snapCharts.customChartsRenderer = function(chart) {

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
}