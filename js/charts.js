
// Prepare some functionality when page has loaded
$( function() {
	snapCharts.initialize();
});

// Encapsulate the AJAX functionality
var snapCharts = {

	// Intended to be called on page ready() event
	'initialize' : function() {
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

	'fetchData' : function (comm, type, scen, vari, fetch_t) {
		$.get(
			"charts_fetch_data.php", { community : comm, dataset: type, scenario : scen, variability: vari, fetch_type: fetch_t },
			function(data) {
				$('#display').html(data);
				drawChart();
				$('#location').html(": " + globalCommunity);
				$('#comm_block').hide();
				$('#export_options').show();
				$('#link_field').val("http://dev.snap.uaf.edu/charts.php?community=" + globalCommunity + "&amp;dataset=" + globalDataset + "&amp;scenario=" + globalScenario + "&amp;variability=" + globalVariability);
			}
		);
	}
};