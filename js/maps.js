/*jshint laxbreak:true */

// Global mapping variables
var map;

window.snap = {};

_.mixin({
	'isFalsy' : function(v) {
		return _.isUndefined(v) || _.isNull(v) || _.isEmpty(v) || _.isNaN(v);
	}
});

// This will be immediately populated by the fragment of code in maps.php that fires after onReady and
// checks for the hashtag values, and sets defaults.  Possible values are enumerated in the
// menus.
snap.state = {
	interval: null,
	range: null,
	scenario: null,
	variable: null,

	// for google map:
	zoom: 3,
	latitude: null,
	longitude: null,

	defaults: {
		interval: 'decadalAverages',
		range: '2010-2019',
		variable: 'temperature',
		scenario: 'A1B',
		zoom: 3,
		latitude: 65,
		longitude: -145
	}
};

snap.submenus = {
	'intervals' : {
		'prefix' : 'as',
		'defaultText' : 'default text placeholder',
		'items': {
			'decadalAverages' : {
				'name' : '10 year average',
				'description' : 'Data is averaged over a 10 year interval'
			},
			'spring' : {
				'name' : 'spring averages',
				'description' : 'Data from March, April, and May are averaged over a 10 year interval'
			},
			'summer' : {
				'name' : 'summer averages',
				'description' : 'Data from June, July, and August are averaged over a 10 year interval'
			},
			'fall' : {
				'name' : 'fall averages',
				'description' : 'Data from September, October, and November are averaged over a 10 year interval'
			},
			'winter' : {
				'name' : 'winter averages',
				'description' : 'Data from December, January, and February are averaged over a 10 year interval'
			}
		}
	},
	'observedIntervals' : {
		'prefix' : 'as',
		'defaultText' : 'default text placeholder',
		'items': {
			'decadalAverages' : {
				'name' : '30 year average',
				'description' : 'Data is averaged over a 30 year interval'
			},
			'spring' : {
				'name' : 'spring averages',
				'description' : 'Data from March, April, and May are averaged over a 10 year interval'
			},
			'summer' : {
				'name' : 'summer averages',
				'description' : 'Data from June, July, and August are averaged over a 10 year interval'
			},
			'fall' : {
				'name' : 'fall averages',
				'description' : 'Data from September, October, and November are averaged over a 10 year interval'
			},
			'winter' : {
				'name' : 'winter averages',
				'description' : 'Data from December, January, and February are averaged over a 10 year interval'
			}
		}
	},
	'nonseasonalIntervals' : {
		'prefix' : 'as',
		'defaultText' : 'default text placeholder',
		items: {
			'decadalAverages' : {
				'name' : '10 year average',
				'description' : 'Data is averaged over a 10 year interval'
			}
		}
	},
	'nonseasonalObservedIntervals' : {
		'prefix' : 'as',
		'defaultText' : 'default text placeholder',
		items: {
			'decadalAverages' : {
				'name' : '30 year average',
				'description' : 'Data is averaged over 30 years'
			}
		}
	},
	'ranges' :  {
		'prefix' : 'from',
		'defaultText' : 'default text placeholder',
		items: {
			'2010-2019' : {
				'name' : '2010&ndash;2019',
				'description' : '2010&ndash;2019'
			},
			'2020-2029' : {
				'name' : '2020&ndash;2029',
				'description' : '2020&ndash;2029'
			},
			'2030-2039' : {
				'name' : '2030&ndash;2039',
				'description' : '2030&ndash;2039'
			},
			'2040-2049' : {
				'name' : '2040&ndash;2049',
				'description' : '2040&ndash;2049'
			},
			'2050-2059' : {
				'name' : '2050&ndash;2059',
				'description' : '2050&ndash;2059'
			},
			'2060-2069' : {
				'name' : '2060&ndash;2069',
				'description' : '2060&ndash;2069'
			},
			'2070-2079' : {
				'name' : '2070&ndash;2079',
				'description' : '2070&ndash;2079'
			},
			'2080-2089' : {
				'name' : '2080&ndash;2089',
				'description' : '2080&ndash;2089'
			},
			'2090-2099' : {
				'name' : '2090&ndash;2099',
				'description' : '2090&ndash;2099'
			}
		}
	},
	'historicalRange' : {
		'prefix' : '',
		'renderer' : {
			// needs to return prefix: and title:
			getTitleJson : function() {
				return {
					prefix:'',
					title:'1960&ndash;1990'
				};
			},
			getContent : function() {
				return '<p>Blurb about the PRISM data, its scope, perhaps a <a>link somewhere about it?</a></p>';
			}
		}
	},
	'historicalInterval' : {
		'prefix' : '',
		'renderer' : {
			getTitleJson : function() {
				return {
					prefix: 'as',
					title: '30 year average'
				};
			},
			getContent : function() {
				return '<p>Blurb about the range of time and/or ...etc</p>';
			}
		}
	},
	'scenarios' :  {
		'prefix' : 'assuming',
		'defaultText' : 'default text placeholder',
		items: {
			'A2' : {
				'name' : 'rapid increases in emissions (<span>A2</span>)',
				'description' : 'The Intergovernmental Panel on Climate Change created a range of scenarios to explore alternative development pathways, covering a wide range of demographic, economic and technological driving forces and resulting greenhouse gas emissions. The A2 scenario describes a very heterogeneous world with high population growth, slow economic development and slow technological change.'
			},
			'A1B' : {
				'name' : 'mid-range emissions (<span>A1B</span>)',
				'description' : 'The Intergovernmental Panel on Climate Change created a range of scenarios to explore alternative development pathways, covering a wide range of demographic, economic and technological driving forces and resulting greenhouse gas emissions. The Scenario A1B assumes a world of very rapid economic growth, a global population that peaks in mid-century, rapid introduction of new and more efficient technologies, and a balance between fossil fuels and other energy sources.'
			},
			'B1' : {
				'name' : 'leveling and declining emissions (<span>B1</span>)',
				'description' : 'The Intergovernmental Panel on Climate Change created a range of scenarios to explore alternative development pathways, covering a wide range of demographic, economic and technological driving forces and resulting greenhouse gas emissions. The B1 scenario describes a convergent world, with the same global population as A1B, but with more rapid changes in economic structures toward a service and information economy.'
			}
		}
	}
};

// el = a JQuery object
snap.renderers = {
	'standard' : function(el, category, source) {

		var wrapper = $('<div/>', {
			'class' : 'wrapper'
		});

		var titleJson = ( _.isObject(source.renderer) ) ? source.renderer.getTitleJson() : {
			prefix: source.prefix,
			title: source.items[window.snap.state[category]].name
		};

		var title = $(
			_.template(
				'<h4 class="menuOption" data-variable="variable"><%= prefix %> <%= title %></h4>'
				+ '<div class="menuSpacer"></div>'
				, titleJson
			)
		)
		.data('category', category)
		.click(
			function(e) {

				e.stopPropagation();
				$('.menuOptions').hide();
				$('.menuSpacer').removeClass('menuSpacerToggle');
				var el = $(this);

				if( false === ( el.parent().hasClass('active') ) ) {
					el.parent().addClass('active');
					el.parent().find('.menuSpacer').addClass('menuSpacerToggle');
					var content = $('#' + el.data('category') + '_content').show();
				} else {
					el.parent().removeClass('active');
				}
			}
		).hover(
			function(e) {
				$(this).parent().find('.menuSpacer').css('opacity', 1.0);
			},
			function(e) {
				$(this).parent().find('.menuSpacer').css('opacity', 0.5);
			}
		);

		var content = $('<div/>', {
			'class' : 'menuOptions',
			'id' : category + '_content',
			'style' : 'display: none;'
		});

		if( _.isObject(source.renderer) ) {
			content.append(source.renderer.getContent());
		} else {
			content.append(
				$('<div/>', {
					'class' : 'descriptions',
					'id' : category + '_descriptions'
				})
				.data('category', category)
				.append(
					$('<p/>')
					.html(source.defaultText)
				)
			);

			var optionsList = $('<ul/>')
			.click(function(e){
				e.stopPropagation();
			});

			_.each(source.items, function(e, i, l) {
				optionsList.append($('<li/>')
				.click(function(e) {
					// swap out the map on click
					$('.menuOptions').hide();
					$('.menuSpacer').removeClass('menuSpacerToggle');
					window.snap.state[$(this).data('category')] = $(this).data('option');
					addMap();
				})
				.data('category', category)
				.data('option', i)
				.html(e.name)
				.hover(

					function(e) {
						$('.menuOptions :visible').parent().height(  );
						var category = $(e.currentTarget).data('category');
						var option = $(e.currentTarget).data('option');
						$('#' + category + '_descriptions').find('p').html(source.items[option].description);
						
						var textHeight = $('#' + category + '_descriptions').find('p').height();
						var wrapperHeight = $('.active .menuOptions').height();

						//TODO this is currently broken again, probably DOM change.

						if( wrapperHeight < textHeight ) {
							$('.active .menuOptions').height(textHeight + 16 ); // increase height + 8px padding
						}

					},
					function(e) {
						var category = $(e.currentTarget).data('category');
						$('#' + category + '_descriptions').find('p').html(source.defaultText);
					}

				));
			}, this);
			content.append(optionsList);
		}

		el.append(wrapper.append(title).append(content));
		
	}
};

// Define menu structure
snap.menus = {
	'variable' : {
		prefix: '',
		defaultText: 'defaultText',
		items: {
			'temperature' : {
				'name' : 'Projected Average Annual Temperature',
				'description' : 'The average annual precipitation for the given range',
				'submenus' : {
					// 'key' => 'value', where key is the same as the key in the window.snap.state object.
					'interval' : window.snap.submenus.intervals,
					'range' : window.snap.submenus.ranges,
					'scenario' : window.snap.submenus.scenarios
				}
			},
			'precipitation' : {
				'name' : 'Projected Average Annual Precipitation',
				'description' : 'This is the average annual temperature calculated for the given range',
				'submenus' : {
					'interval' : window.snap.submenus.intervals,
					'range' : window.snap.submenus.ranges,
					'scenario' : window.snap.submenus.scenarios
				}
			},
			'dayOfFreeze' : {
				'name' : 'Projected Day of Freeze',
				'description' : 'placeholder',
				'submenus' : {
					'interval' : window.snap.submenus.nonseasonalIntervals,
					'range' : window.snap.submenus.ranges,
					'scenario' : window.snap.submenus.scenarios
				}
			},
			'dayOfThaw' : {
				'name' : 'Projected Day of Thaw',
				'description' : 'placeholder',
				'submenus' : {
					'interval' : window.snap.submenus.nonseasonalIntervals,
					'range' : window.snap.submenus.ranges,
					'scenario' : window.snap.submenus.scenarios
				}
			},
			'lengthOfGrowingSeason' : {
				'name' : 'Projected Length of Growing Season',
				'description' : 'placeholder',
				'submenus' : {
					'interval' : window.snap.submenus.nonseasonalIntervals,
					'range' : window.snap.submenus.ranges,
					'scenario' : window.snap.submenus.scenarios
				}
			},
			'observedTemperature' : {
				'name' : 'Observed Average Annual Temperature',
				'description' : 'The average annual precipitation for the given range',
				'submenus' : {
					'interval' : window.snap.submenus.observedIntervals,
					'historical' : window.snap.submenus.historicalRange
				}
			},
			'observedPrecipitation' : {
				'name' : 'Observed Average Annual Precipitation',
				'description' : 'This is the average annual temperature calculated for the given range',
				'submenus' : {
					'interval' : window.snap.submenus.observedIntervals,
					'historical' : window.snap.submenus.historicalRange
				}
			},
			'observedDayOfFreeze' : {
				'name' : 'Observed Day of Freeze',
				'description' : 'placeholder',
				'submenus' : {
					'historicalInterval' : window.snap.submenus.historicalInterval,
					'historical' : window.snap.submenus.historicalRange
				}
			},
			'observedDayOfThaw' : {
				'name' : 'Observed Day of Thaw',
				'description' : 'placeholder',
				'submenus' : {
					'historicalInterval' : window.snap.submenus.historicalInterval,
					'historical' : window.snap.submenus.historicalRange
				}
			},
			'observedLengthOfGrowingSeason' : {
				'name' : 'Observed Length of Growing Season',
				'description' : 'placeholder',
				'submenus' : {
					'historicalInterval' : window.snap.submenus.historicalInterval,
					'historical' : window.snap.submenus.historicalRange
				}
			}
		}
	}
};

function buildMenus() {

	$('#mapMenu').empty();

	// build the variables menu, always
	window.snap.renderers.standard($('#mapMenu'), 'variable', window.snap.menus.variable);

	// get the active variable and render its submenus
	_.each(window.snap.menus.variable.items[window.snap.state.variable].submenus, function(e, i, l) {
		window.snap.renderers.standard($('#mapMenu'), i, e);
	});
}

//Update address to reflect new hash
function writeHash(){
	window.location.hash = window.snap.state.variable
	+ "/" + window.snap.state.interval
	+ "/" + window.snap.state.range
	+ "/" + window.snap.state.scenario
	+ "/" + map.getZoom()
	+ "/" + (map.getCenter()).lat()
	+ "/" + (map.getCenter()).lng();
}

/*
//Highlight the menu to show changes from new options
function updateMenu(){
	$('.menuOption').children('div:first-child')  //Done to workaround chrome issue
	.animate( { backgroundColor: '#a7c95a' }, 300)
	.animate( { backgroundColor: '#a7c95a' }, 600)
	.animate( { backgroundColor: 'white' }, 900);
	$('.menuOption').children('div:first-child').css( "backgroundColor", "white"); //Done for Chrome workaround
}
*/

function drawLegend() {

	try {

// yuck, but, this maintains the 'keys' between the static data.
		var legendKey = window.snap.mapUrls[window.snap.state.variable].prefix;
		if( false === _.isUndefined(window.snap.mapUrls[window.snap.state.variable][window.snap.state.interval]) ) {
			legendKey += '_'
			+ window.snap.mapUrls[window.snap.state.variable][window.snap.state.interval];
		}

		if( _.isUndefined(legendKey) ) {
			throw 'Data set not defined when trying to draw legend.';
		}
		var legend = window.snap.mapLegends[legendKey];

		var el = $('#legend_wrapper').empty().append(_.template('<h4><%= title %></h4>', legend));
		var table = $('<table/>');
		_.each(legend.colors, function(e, i) {
			$('<tr/>')
				.append(_.template(
					'<td style="background-color: <%= color %>">&nbsp;</td>'
					+ '<td><%= range %></td>'
					, { color: e, range: i }
				))
				.appendTo(table);
		});
		el.append(table).show();

	} catch(e) {

		$('#legend_wrapper').hide();

	}
}

// Some combinations of map variables aren't valid.  Fix them here if necessary.
function validateState() {

	switch( window.snap.state.variable ) {
		// these three data sets don't allow range, scenario, or interval choices
		case 'observedDayOfThaw': // fallthru
		case 'observedDayOfFreeze': // fallthru
		case 'observedLengthOfGrowingSeason': // fallthru
			window.snap.state.scenario = '';
			window.snap.state.range = '';
			window.snap.state.interval = 'decadalAverages';
			writeHash();
			break;

		// these data sets don't allow range, or scenario choices
		case 'observedPrecipitation': // fallthru
		case 'observedTemperature': // fallthru
			if(_.isFalsy(window.snap.state.interval)) {
				window.snap.state.interval = window.snap.state.defaults.interval;
			}
			window.snap.state.scenario = '';
			window.snap.state.range = '';
			writeHash();
			break;

		// these variables only allow one range, decadalVerages
		case 'dayOfFreeze': //fallthru
		case 'dayOfThaw': //fallthru
		case 'lengthOfGrowingSeason': //fallthru

			if(_.isFalsy(window.snap.state.scenario)) {
				window.snap.state.scenario = window.snap.state.defaults.scenario;
			}
			if(_.isFalsy(window.snap.state.range)) {
				window.snap.state.range = window.snap.state.defaults.range;
			}

			window.snap.state.interval = 'decadalAverages';
			writeHash();
			break;

		case 'temperature'://fallthru
		case 'precipitation':
			if(_.isFalsy(window.snap.state.interval)) {
				window.snap.state.interval = window.snap.state.defaults.interval;
			}

			if(_.isFalsy(window.snap.state.scenario)) {
				window.snap.state.scenario = window.snap.state.defaults.scenario;
			}
			if(_.isFalsy(window.snap.state.range)) {
				window.snap.state.range = window.snap.state.defaults.range;
			}
			break;

		default:
			break;
	}
}

//Adds a new map layer overlay, based on current user settings
function addMap() {

	validateState();

	var tilepath;
	switch(window.snap.state.variable) {
		// these data sets have a different pattern for constructing the URLs.
		// better fix: template it.
		case 'observedDayOfThaw': // fallthru
		case 'observedDayOfFreeze': // fallthru
		case 'observedLengthOfGrowingSeason': // fallthru
			tilepath = window.snap.mapUrls.baseUrl
				+ window.snap.mapUrls[window.snap.state.variable].prefix
				+ window.snap.mapUrls.urlSuffix;
			break;
						
		case 'observedPrecipitation': // fallthru
		case 'observedTemperature': // fallthru
			tilepath = window.snap.mapUrls.baseUrl
				+ window.snap.mapUrls[window.snap.state.variable].prefix
				+ '_'
				+ window.snap.mapUrls[window.snap.state.variable][window.snap.state.interval]
				+ window.snap.mapUrls.urlSuffix;
			break;
		
		default:
			tilepath = window.snap.mapUrls.baseUrl
				+ window.snap.mapUrls[window.snap.state.variable].prefix
				+ '_'
				+ window.snap.mapUrls[window.snap.state.variable][window.snap.state.interval]
				+ window.snap.mapUrls[window.snap.state.variable].postfix
				+ '_'
				+ window.snap.mapUrls.scenarios[window.snap.state.scenario]
				+ '_'
				+ window.snap.state.range.replace('-','_')
				+ window.snap.mapUrls.urlSuffix;
			break;
	}
	
	window.snap.map = new google.maps.ImageMapType({
		getTileUrl: function(tile, zoom) {
			return tilepath + tile.x + "/" + tile.y + "/" + zoom + ".png";
		},
		tileSize: new google.maps.Size(256, 256),
		opacity: 0.7
	});

	map.overlayMapTypes.push(null); // create empty overlay entry
	map.overlayMapTypes.setAt("0", window.snap.map);


	gnames = new google.maps.ImageMapType({
		getTileUrl: function(a, z) {
			var tiles = 1 << z, X = (a.x % tiles);
			if(X < 0) { X += tiles; }
			return "http://mt0.google.com/vt/v=apt.116&hl=en-US&x=" +
			X + "&y=" + a.y + "&z=" + z + "&s=G&lyrs=h";
		},
		tileSize: new google.maps.Size(256, 256),
		isPng: false,
		maxZoom: 20,
		name: "lyrs=h",
		alt: "Hybrid labels"
	});

	map.overlayMapTypes.push(null); // create empty overlay entry
	map.overlayMapTypes.setAt("1",gnames );

	drawLegend();
	writeHash(); // Needed as otherwise it doesn't trigger from the idle event as moving/zooming does
	buildMenus();

}

/*
* Google Map initialization function
* Called on the initial page load.
* Sets up default map space, values, etc.
*/
function init(zl, la, ln) {

	map = new google.maps.Map(document.getElementById('map_canvas'), {

		zoom: window.snap.state.zoom,
		minZoom: 2,
		'center': new google.maps.LatLng(window.snap.state.latitude, window.snap.state.longitude),
		disableDefaultUI: true,
		navigationControl: true,
		navigationControlOptions: {
			position: google.maps.ControlPosition.RIGHT_TOP
		},
		scaleControl: true,
		mapTypeControl: true,
		mapTypeId: google.maps.MapTypeId.TERRAIN
	});

	resize();
}

// called when the page is resized to resize the map to make it as large as possible
var resize = function() {

	var bodyHeight = $('body').height();
	var headerHeight = $('#map_header').height();
	var mapBarHeight = $('#map_menu_bar').height();
	var footerHeight = $('#map_footer').height();

	// +21px to get a bit of extra room below the footer.
	// Because many items are floating, the DOM doesn't quite give us what we expect
	// for the true wrapped height of the header.  todo/fix
	var availableHeight = bodyHeight - (headerHeight + footerHeight + mapBarHeight + 30);
	if (availableHeight > 0) {
		$("#map_canvas").height(availableHeight);
	}

};

snap.mapUrls = {
	'baseUrl' : 'http://tiles.gina.alaska.edu/snap/',
	'urlSuffix' : '.google/tile/',

	'precipitation' : {
		'prefix' : 'pr',
		'decadalAverages' : 'decadal_mean_annual_total',
		'winter' : 'decadal_mean_DJF_total',
		'summer' : 'decadal_mean_JJA_total',
		'spring' : 'decadal_mean_MAM_total',
		'fall' : 'decadal_mean_SON_total',
		'postfix' : '_mm_5modelAvg'
	},

	'temperature' : {
		'prefix' : 'tas',
		'decadalAverages' : 'decadal_mean_annual_mean',
		'winter' : 'decadal_mean_DJF_mean',
		'summer' : 'decadal_mean_JJA_mean',
		'spring' : 'decadal_mean_MAM_mean',
		'fall' : 'decadal_mean_SON_mean',
		'postfix' : '_c_5modelAvg'
	},

	'dayOfFreeze' : {
		'prefix' : 'dof',
		'decadalAverages' : '5modelAvg',
		'postfix':''
	},

	'dayOfThaw' : {
		'prefix' : 'dot',
		'decadalAverages' : '5modelAvg',
		'postfix':''
	},

	'lengthOfGrowingSeason' : {
		'prefix' : 'logs',
		'decadalAverages' : '5modelAvg',
		'postfix':''
	},

	'observedTemperature' : {
		'prefix' : 'tas',
		'decadalAverages' : 'annual_mean_c_akcan_prism_1961_1990',
		'winter' : '30year_DJF_mean_c_akcan_prism_1961_1990',
		'summer' : '30year_JJA_mean_c_akcan_prism_1961_1990',
		'spring' : '30year_MAM_mean_c_akcan_prism_1961_1990',
		'fall' : '30year_SON_mean_c_akcan_prism_1961_1990'
	},

	'observedPrecipitation' : {
		'prefix' : 'pr',
		'decadalAverages' : '30year_mean_annual_total_mm_akcan_prism_1961_1990',
		'winter' : '30year_mean_DJF_total_mm_akcan_prism_1961_1990',
		'summer' : '30year_mean_JJA_total_mm_akcan_prism_1961_1990',
		'spring' : '30year_mean_MAM_total_mm_akcan_prism_1961_1990',
		'fall' : '30year_mean_SON_total_mm_akcan_prism_1961_1990'
	},
	'observedDayOfFreeze' : {
		'prefix' : 'dof_akcan_prism_1961_1990'
	},

	'observedDayOfThaw' : {
		'prefix' : 'dot_akcan_prism_1961_1990'
	},

	'observedLengthOfGrowingSeason' : {
		'prefix' : 'logs_akcan_prism_1961_1990'
	},

	'scenarios': {
		'A1B' : 'sresa1b',
		'A2' : 'sresa2',
		'B1' : 'sresb1'
	}
};

snap.mapLegends = {
'tas_decadal_mean_SON_mean' : { 'title':'Temperature (&deg;C)', 'colors' : {
	'9.6 to 16.2' : '#D62F27',
	'7.4 to 9.5' : '#E05138',
	'5.1 to 7.3' : '#EB6E4B',
	'2.9 to 5.0' : '#F2885E',
	'0.6 to 2.8' : '#F7A474',
	'-1.6 to 0.5' : '#FCC58D',
	'-3.9 to -1.7' : '#FFE3A6',
	'-6.1 to -4.0' : '#FFFFBF',
	'-8.4 to -6.2' : '#E3E8BE',
	'-10.6 to -8.5' : '#CAD4BE',
	'-12.9 to -10.7' : '#AEBDBC',
	'-15.1 to -13.0' : '#95ACBD',
	'-17.4 to -15.2' : '#7B98BA',
	'-19.6 to -17.5' : '#6187B8',
	'-22.0 to -19.7' : '#4575B5'}
},
'dof_5modelAvg' :  { 'title':'Day Number', 'colors' : {
	'0 to 0' : '#E1E1E1',
	'1 to 275' : '#F0E5CE',
	'276 to 280' : '#E0CBA2',
	'281 to 286' : '#D1B479',
	'287 to 291' : '#D1B471',
	'292 to 295' : '#E0CF89',
	'296 to 298' : '#F0E8A3',
	'299 to 302' : '#FFFFBF',
	'303 to 305' : '#D3F0B9',
	'306 to 308' : '#AAE3B5',
	'309 to 311' : '#7DD4AE',
	'312 to 315' : '#61C2A0',
	'316 to 322' : '#57AD8E',
	'323 to 364' : '#4E9C7E',
	'365 to 365' : '#458A6F'}
},

'dot_5modelAvg' : { 'title':'Day Number', 'colors' :  {
	'0 to 0' : '#458A6F',
	'1 to 79' : '#4E9C7E',
	'80 to 86' : '#57AD8E',
	'87 to 89' : '#61C2A0',
	'90 to 92' : '#7DD4AE',
	'93 to 96' : '#AAE3B5',
	'97 to 102' : '#D3F0B9',
	'103 to 106' : '#FFFFBF',
	'107 to 109' : '#F0E8A3',
	'110 to 113' : '#E0CF89',
	'114 to 117' : '#D1B471',
	'118 to 122' : '#D1B479',
	'123 to 129' : '#E0CBA2',
	'130 to 364' : '#F0E5CE',
	'365 to 365' : '#E1E1E1'}
},

'logs_5modelAvg' :  { 'title':'Day Number', 'colors' : {
	'0 to 24' : '#E1E1E1',
	'25 to 49' : '#F0E5CE',
	'50 to 73' : '#E0CBA2',
	'74 to 97' : '#D1B479',
	'98 to 122' : '#D1B471',
	'123 to 146' : '#E0CF89',
	'147 to 170' : '#F0E8A3',
	'171 to 195' : '#FFFFBF',
	'196 to 219' : '#D3F0B9',
	'220 to 243' : '#AAE3B5',
	'244 to 268' : '#7DD4AE',
	'269 to 292' : '#61C2A0',
	'293 to 316' : '#57AD8E',
	'317 to 341' : '#4E9C7E',
	'342 to 365' : '#458A6F'}
},

'pr_decadal_mean_annual_total': { 'title':'Total Precipitation (mm)', 'colors' : {
	'3294 to 15523' : '#248391',
	'2323 to 3293' : '#489499',
	'1643 to 2322' : '#65A39E',
	'1254 to 1642' : '#82B5A6',
	'963 to 1253' : '#A1C7AC',
	'768 to 962' : '#C2DBB4',
	'671 to 767' : '#E1EDB9',
	'574 to 670' : '#FFFFBF',
	'526 to 573' : '#F2E4A5',
	'477 to 525' : '#E6CA8A',
	'428 to 476' : '#D6AD6F',
	'380 to 427' : '#C79558',
	'331 to 379' : '#BA8045',
	'283 to 330' : '#AB6A32',
	'136 to 282' : '#9C551F'}
},

'pr_decadal_mean_DJF_total' :  { 'title':'Total Precipitation (mm)', 'colors' : {
	'751 to 5559' : '#248391',
	'396 to 750' : '#489499',
	'233 to 395' : '#65A39E',
	'154 to 232' : '#82B5A6',
	'116 to 153' : '#A1C7AC',
	'91 to 115' : '#C2DBB4',
	'77 to 90' : '#E1EDB9',
	'70 to 76' : '#FFFFBF',
	'66 to 69' : '#F2E4A5',
	'63 to 65' : '#E6CA8A',
	'60 to 62' : '#D6AD6F',
	'57 to 59' : '#C79558',
	'51 to 56' : '#BA8045',
	'41 to 50' : '#AB6A32',
	'14 to 40' : '#9C551F'}
},
'pr_decadal_mean_JJA_total': { 'title':'Total Precipitation (mm)', 'colors' : {
	'565 to 3269' : '#248391',
	'399 to 564' : '#489499',
	'335 to 398' : '#65A39E',
	'297 to 334' : '#82B5A6',
	'271 to 296' : '#A1C7AC',
	'246 to 270' : '#C2DBB4',
	'233 to 245' : '#E1EDB9',
	'220 to 232' : '#FFFFBF',
	'207 to 219' : '#F2E4A5',
	'195 to 206' : '#E6CA8A',
	'182 to 194' : '#D6AD6F',
	'156 to 181' : '#C79558',
	'131 to 155' : '#BA8045',
	'105 to 130' : '#AB6A32',
	'15 to 104' : '#9C551F'}
},

'pr_decadal_mean_MAM_total' :  { 'title':'Total Precipitation (mm)', 'colors' : {
	'604 to 2710' : '#248391',
	'377 to 603' : '#489499',
	'264 to 376' : '#65A39E',
	'195 to 263' : '#82B5A6',
	'151 to 194' : '#A1C7AC',
	'125 to 150' : '#C2DBB4',
	'108 to 124' : '#E1EDB9',
	'99 to 107' : '#FFFFBF',
	'90 to 98' : '#F2E4A5',
	'82 to 89' : '#E6CA8A',
	'73 to 81' : '#D6AD6F',
	'64 to 72' : '#C79558',
	'56 to 63' : '#BA8045',
	'38 to 55' : '#AB6A32',
	'11 to 37' : '#9C551F'}
},

'pr_decadal_mean_SON_total' :  { 'title':'Total Precipitation (mm)', 'colors' : {
	'1303 to 5569' : '#248391',
	'839 to 1302' : '#489499',
	'543 to 838' : '#65A39E',
	'396 to 542' : '#82B5A6',
	'290 to 395' : '#A1C7AC',
	'227 to 289' : '#C2DBB4',
	'185 to 226' : '#E1EDB9',
	'164 to 184' : '#FFFFBF',
	'142 to 163' : '#F2E4A5',
	'121 to 141' : '#E6CA8A',
	'100 to 120' : '#D6AD6F',
	'79 to 99' : '#C79558',
	'58 to 78' : '#BA8045',
	'37 to 57' : '#AB6A32',
	'0 to 36' : '#9C551F'
}},

'tas_decadal_mean_annual_mean' :  { 'title':'Temperature (&deg;C)', 'colors' : {
	'9.2 to 15.6' : '#D62F27',
	'7.0 to 9.1' : '#E05138',
	'4.7 to 6.9' : '#EB6E4B',
	'2.4 to 4.6' : '#F2885E',
	'0.1 to 2.3' : '#F7A474',
	'-2.1 to 0.0' : '#FCC58D',
	'-4.4 to -2.2' : '#FFE3A6',
	'-6.7 to -4.5' : '#FFFFBF',
	'-8.9 to -6.8' : '#E3E8BE',
	'-11.2 to -9.0' : '#CAD4BE',
	'-13.5 to -11.3' : '#AEBDBC',
	'-15.7 to -13.6' : '#95ACBD',
	'-18.0 to -15.8' : '#7B98BA',
	'-20.3 to -18.1' : '#6187B8',
	'-22.6 to -20.4' : '#4575B5'
}},
'tas_decadal_mean_DJF_mean' :  { 'title':'Temperature (&deg;C)', 'colors' : {
	'3.6  to 9.3' : '#D62F27',
	'1.2  to 3.5' : '#E05138',
	'-1.2 to 1.1' : '#EB6E4B',
	'-3.7 to -1.3' : '#F2885E',
	'-6.1 to -3.8' : '#F7A474',
	'-8.5 to -6.2' : '#FCC58D',
	'-10.9 to -8.6' : '#FFE3A6',
	'-13.3 to -11.0' : '#FFFFBF',
	'-15.8 to -13.4' : '#E3E8BE',
	'-18.2 to -15.9' : '#CAD4BE',
	'-20.6 to -18.3' : '#AEBDBC',
	'-23.0 to -20.7' : '#95ACBD',
	'-25.4 to -23.1' : '#7B98BA',
	'-27.8 to -25.5' : '#6187B8',
	'-30.4 to -27.9' : '#4575B5'
}},
'tas_decadal_mean_JJA_mean' :  { 'title':'Temperature (&deg;C)', 'colors' : {
	'18.4 to 29' : '#D62F27',
	'16.6 to 18.3' : '#E05138',
	'14.9 to 16.5' : '#EB6E4B',
	'13.4 to 14.8' : '#F2885E',
	'12.0 to 13.3' : '#F7A474',
	'10.6 to 11.9' : '#FCC58D',
	'9.3 to 10.5' : '#FFE3A6',
	'7.9 to 9.2' : '#FFFFBF',
	'6.4 to 7.8' : '#E3E8BE',
	'4.8 to 6.3' : '#CAD4BE',
	'2.7 to 4.7' : '#AEBDBC',
	'0.2 to 2.6' : '#95ACBD',
	'-3.0 to 0.1' : '#7B98BA',
	'-7.1 to -3.1' : '#6187B8',
	'-15.6 to -7.2' : '#4575B5'
}	},
'tas_decadal_mean_MAM_mean' : { 'title':'Temperature (&deg;C)', 'colors' :  {
	'8.9 to 14.6' : '#D62F27',
	'6.5 to 8.8' : '#E05138',
	'4.1 to 6.4' : '#EB6E4B',
	'1.7 to 4.0' : '#F2885E',
	'-0.7  to 1.6' : '#F7A474',
	'-3.1 to  -0.8' : '#FCC58D',
	'-5.4 to -3.2' : '#FFE3A6',
	'-7.8 to -5.5' : '#FFFFBF',
	'-10.2 to -7.9' : '#E3E8BE',
	'-12.6 to -10.3' : '#CAD4BE',
	'-15.0 to -12.7' : '#AEBDBC',
	'-17.4 to -15.1' : '#95ACBD',
	'-19.7 to -17.5' : '#7B98BA',
	'-22.1 to -19.8' : '#6187B8',
	'-24.6 to -22.2' : '#4575B5'
	}}
};

// Add duplicate references so that observed data uses the same legends
snap.mapLegends['tas_annual_mean_c_akcan_prism_1961_1990'] = snap.mapLegends['tas_decadal_mean_annual_mean'];
snap.mapLegends['tas_30year_MAM_mean_c_akcan_prism_1961_1990'] = snap.mapLegends['tas_decadal_mean_MAM_mean'];
snap.mapLegends['tas_30year_JJA_mean_c_akcan_prism_1961_1990'] = snap.mapLegends['tas_decadal_mean_JJA_mean'];
snap.mapLegends['tas_30year_SON_mean_c_akcan_prism_1961_1990'] = snap.mapLegends['tas_decadal_mean_SON_mean'];
snap.mapLegends['tas_30year_DJF_mean_c_akcan_prism_1961_1990'] = snap.mapLegends['tas_decadal_mean_DJF_mean'];
snap.mapLegends['pr_30year_mean_annual_total_mm_akcan_prism_1961_1990'] = snap.mapLegends['pr_decadal_mean_annual_total'];
snap.mapLegends['pr_30year_mean_MAM_total_mm_akcan_prism_1961_1990'] = snap.mapLegends['pr_decadal_mean_MAM_total'];
snap.mapLegends['pr_30year_mean_JJA_total_mm_akcan_prism_1961_1990'] = snap.mapLegends['pr_decadal_mean_JJA_total'];
snap.mapLegends['pr_30year_mean_SON_total_mm_akcan_prism_1961_1990'] = snap.mapLegends['pr_decadal_mean_SON_total'];
snap.mapLegends['pr_30year_mean_DJF_total_mm_akcan_prism_1961_1990'] = snap.mapLegends['pr_decadal_mean_DJF_total'];
snap.mapLegends['dof_akcan_prism_1961_1990'] = snap.mapLegends['dof_5modelAvg'];
snap.mapLegends['dot_akcan_prism_1961_1990'] = snap.mapLegends['dot_5modelAvg'];
snap.mapLegends['logs_akcan_prism_1961_1990'] = snap.mapLegends['logs_5modelAvg'];
