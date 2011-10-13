
	// Global mapping variables
	var map;
	var marker1;
	var marker2;
	var rectangle;
	var polygon;
	var polyline;
	var point_list = new google.maps.MVCArray();
	var marker_list = [];
	var poly_listener;
	var fullscreen = false;
	// Global individual map data
	var globalVariable = "";
	var globalInterval = "";
	var globalRange = "";
	var globalScenario = "";
	var globalModel = "";
	var globalResolution = "";
	var newmap;	
	var gmnames;
	//Show the sub menu for a selected variable
	function showVariable(item){
		$(".menuContentsLeft div").show();
		$(".menuContents").parent().not("#" + item.id).children(".menuContents").hide();
		$(".menuSpacer").parent().not("#" + item.id).children(".menuSpacer").removeClass("menuSpacerToggle");
		$("#" + item.id + " .menuContents").toggle();
		$("#" + item.id + " > .menuSpacer").toggleClass("menuSpacerToggle");
	}
	//Build the menu when there are changes
	function buildMenu(vari,interval,range,scenario,model,resolution){
		$.ajax({
                    url: 'maps_update.php',
                    type: 'GET',
		    async: false,
                    data: "requesttype=build&variable=" + vari + "&interval=" + interval + "&range=" + range + "&scenario=" + scenario + "&model=" + model + "&resolution=" + resolution,
                    success: function(resp) {
			$('#menu_items').html(resp);
                    }
            });
		/*
		$.get(
			"maps_update.php", { variable : vari, requesttype : "build" },
			function(data){
				var lower = "</div><div>Variable=" + globalVariable + " : Interval=" + globalInterval + " : Range=" + globalRange;
				lower += " : Scenario=" + globalScenario + " : Model=" + globalModel + " : Resolution=" + globalResolution + "</div>";
				$('#menu_items').html(data + lower);
			}, "html");
		*/
	}
	//Update address to reflect new hash
	function writeHash(){
		window.location.hash = globalVariable + "/" + globalInterval + "/" + globalRange + "/" + globalScenario + "/" + globalModel + "/" + globalResolution;
	}
	//Highlight the menu to show changes from new options
	function updateMenu(){
		$('.menuOption > div:first-child')
			.animate( { backgroundColor: '#a7c95a' }, 300)
			.animate( { backgroundColor: '#a7c95a' }, 600)
			.animate( { backgroundColor: 'white' }, 900);
		$('.menuOption > div:first-child').css( "backgroundColor", "white");
	 }
	//Adds a new map layer overlay, based on current user settings
	function addMap(mapvariable, mapvalue){
		if ($(mapvariable).parents(".menuOption").attr("id") == "menu_variable"){ globalVariable = mapvalue; }
		else if ($(mapvariable).parents(".menuOption").attr("id") == "menu_interval"){ globalInterval = mapvalue; }
		else if ($(mapvariable).parents(".menuOption").attr("id") == "menu_range"){ globalRange = mapvalue; }
		else if ($(mapvariable).parents(".menuOption").attr("id") == "menu_scenario"){ globalScenario = mapvalue; }
		else if ($(mapvariable).parents(".menuOption").attr("id") == "menu_model"){ globalModel = mapvalue; }
		else if ($(mapvariable).parents(".menuOption").attr("id") == "menu_resolution"){ globalResolution = mapvalue; }
		var tilepath = "";
		var requestinfo = "requesttype=newmap&variable=" + globalVariable + "&interval=" + globalInterval + "&range=" + globalRange + "&scenario=" + globalScenario + "&model=" + globalModel + "&resolution=" + globalResolution;
		$.ajax({
                    url: 'maps_update.php',
                    type: 'GET',
		    async: false,
                    data: requestinfo,
                    success: function(resp) {
			tilepath = resp;
                    }
            });

		newmap = new google.maps.ImageMapType({
		    getTileUrl: function(tile, zoom) {
			return tilepath + tile.x + "/" + tile.y + "/" + zoom + ".png";
		    },
		    tileSize: new google.maps.Size(256, 256),
		    opacity: 0.7 
		});
		map.overlayMapTypes.push(null); // create empty overlay entry
		map.overlayMapTypes.setAt("0", newmap);
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
		    })

		map.overlayMapTypes.push(null); // create empty overlay entry
		map.overlayMapTypes.setAt("1",gnames );

		writeHash();

	}
      	/*
        * Google Map initialization function
        * Called on the initial page load.
	* Sets up default map space, values, etc.
      	*/
	function init(fs) {
		map = new google.maps.Map(document.getElementById('map_canvas'), {
			'zoom': 4,
			'center': new google.maps.LatLng(63.5, -147),
			disableDefaultUI: true,
			navigationControl: true,
			navigationControlOptions: {
				position: google.maps.ControlPosition.RIGHT_TOP
			},
			scaleControl: true,
			mapTypeControl: true,
			mapTypeId: google.maps.MapTypeId.TERRAIN
		});
		if (point_list){
			polygon = new google.maps.Polygon({
				map: map,
				fillColor: "#333333",
				fillOpacity: "0.2",
				strokeColor: "#333333",
				strokeWeight: "4"
			});
			polygon.setPaths(point_list);

		}
		resize();
      }
	/*
	  Called when the page is resized
	*/
     	function resize() {
		var h = $("body").height() - $("#map_header").height() - 50;
		if (h > 0) {
			$("#map_canvas").height(h);
		}
		var w = $("body").width();
		if (w > 0) {
			$("#map_header").width(w - 10);
			$("#map_canvas").width(w - 20);
			$("#map_footer").width(w - 10);
		}
	}
	//Shows XY of points
	function redraw() {
		var latLngBounds = new google.maps.LatLngBounds(
		  marker1.getPosition(),
		  marker2.getPosition()

		);
		rectangle.setBounds(latLngBounds);
		document.getElementById("location").innerHTML = "Marker1: " + marker1.getPosition() + "<br/>Marker2: " + marker2.getPosition();
	}
	/* 
	* Adds a map marker to the map
	*/
	function placeMarker(location) {
		var marker = new google.maps.Marker({
			position: location, 
		  	//draggable: true,
			map: map
		});
		if (marker_list.length < 1){
			marker.setIcon("http://maps.google.com/mapfiles/ms/icons/red-dot.png");
		} else {
			marker.setIcon("http://maps.google.com/mapfiles/ms/icons/red.png");
		}
		marker_list.push(marker);
		point_list.push(location);
		if (marker_list.length == "1"){
			google.maps.event.addListener(marker, 'click', function (event) {
				closePoly();
			});
		}
		google.maps.event.addListener(marker, 'drag', function (event) {
			
		});
		polyline.setPath(point_list);
		var coordinate_list = "";
		for (var i = 0; i < point_list.length; i++){
			coordinate_list += "Point " + (i + 1) + ": " + point_list[i] + "<br />";
		}
		document.getElementById("poly_points").innerHTML = coordinate_list;
	}
	/*
		Close the polygon points to create the final polygon and shade it
	*/
	function closePoly(){
		google.maps.event.removeListener(poly_listener);
		polygon.setPaths(point_list);
		
		for (var i = 0; i < marker_list.length; i++){
			this.marker_list[i].setMap(null);
		} 
		polyline.setMap(null);
	}
	/*
		Deletes the values of the polygon array
	*/
	function hidePoly(){
		if (poly_listener){
	                google.maps.event.removeListener(poly_listener);
		}
		if (polyline){
			polyline.setMap(null);
		}
		if (polygon){
			polygon.setMap(null);
		}
		if (marker_list){
			for (var i = 0; i < marker_list.length; i++){
				this.marker_list[i].setMap(null);
			}
		}
		document.getElementById("poly_points").innerHTML = "";
	}
	/*
	* Draw a polygon onto the map with as many points as required
	*/
	function drawPoly(){
		if (marker1 || marker2 || rectangle){
			hideRectangle();
		}
		if (poly_listener){
	                google.maps.event.removeListener(poly_listener);
		}
		poly_listener = google.maps.event.addListener(map, 'click', function(event) {
			placeMarker(event.latLng);
		});
		point_list = [];
		if (marker_list){
			for (var i = 0; i < marker_list.length; i++){
				this.marker_list[i].setMap(null);
			}	

		}
		marker_list = [];
		if (polyline){
			polyline.setMap(null);
		}
		polyline = new google.maps.Polyline({
		  map: map,
		  strokeColor: "#333333",
		  strokeWeight: "4"
		});
		if (polygon){
			polygon.setMap(null);
		}
		polygon = new google.maps.Polygon({
          		map: map,
	  		fillColor: "#333333",
	  		fillOpacity: "0.2",
	  		strokeColor: "#333333",
	  		strokeWeight: "4"
		});
		
	}
	/*
		Deletes a rectangle selection
	*/
	function hideRectangle(){
		marker1.setMap(null);
		marker2.setMap(null);
		rectangle.setMap(null);
		document.getElementById("location").style.visibility = "hidden";
	}
	/*
		Draw a rectangle boundary with 2 labels, allows for drag/drop of corners
	*/
	function drawRectangle(){
		if (polygon || polyline){
			hidePoly();
		}
		if (marker1 || marker2 || rectangle){
			hideRectangle();
		}	
		document.getElementById("location").style.visibility = "visible";
		marker1 = new google.maps.Marker({
		  map: map,
		  position: new google.maps.LatLng(72, -170),
		  draggable: true,
		  icon: "http://maps.google.com/mapfiles/ms/icons/blue.png"
		});
		marker2 = new google.maps.Marker({
		  map: map,
		  position: new google.maps.LatLng(53, -140),
		  draggable: true,
		  icon: "http://maps.google.com/mapfiles/ms/icons/blue.png"
		});
		
		google.maps.event.addListener(marker1, 'drag', redraw);
		google.maps.event.addListener(marker2, 'drag', redraw);
		rectangle = new google.maps.Rectangle({
		  map: map,
		  fillColor: "#0000ff",
		  fillOpacity: "0.2",
		  strokeColor: "#0000ff",
		  strokeWeight: "3"
		});
		redraw();
	}
