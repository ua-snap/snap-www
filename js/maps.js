
      // Global variables
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
      /**
       * Called on the initial page load.
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
			mapTypeControlOptions: {
				style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
			},
			'mapTypeId': google.maps.MapTypeId.ROADMAP
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
      }
      
	function redraw() {
		var latLngBounds = new google.maps.LatLngBounds(
		  marker1.getPosition(),
		  marker2.getPosition()

		);
		rectangle.setBounds(latLngBounds);
		document.getElementById("location").innerHTML = "Marker1: " + marker1.getPosition() + "<br/>Marker2: " + marker2.getPosition();
	}

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
	function closePoly(){
		google.maps.event.removeListener(poly_listener);
		polygon.setPaths(point_list);
		
		for (var i = 0; i < marker_list.length; i++){
			this.marker_list[i].setMap(null);
		} 
		polyline.setMap(null);
	}
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
	function hideRectangle(){
		marker1.setMap(null);
		marker2.setMap(null);
		rectangle.setMap(null);
		document.getElementById("location").style.visibility = "hidden";
	}
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

function maximize(){
	document.getElementById("map_wrapper").style.width = '100%';
	document.getElementById("map_wrapper").style.height = '100%';
	document.getElementById("map_wrapper").style.position = 'fixed';
	document.getElementById("map_wrapper").style.left = '0';
	document.getElementById("map_wrapper").style.top = '0';
	document.getElementById("map_canvas").style.width = '100%';
	document.getElementById("map_canvas").style.height = '100%';
	document.getElementById("map_canvas").style.position = 'absolute';
	document.getElementById("map_canvas").style.left = '0';
	document.getElementById("map_canvas").style.top = '0';
	document.getElementById("data_query").style.left = '0';
	document.getElementById("data_query").style.top = '50%';
	document.getElementById("footer").style.visibility = "hidden";
	document.getElementById("size_toggle").style.right = "5px";
	document.getElementById("size_toggle").style.bottom = "5px";
	document.getElementById("size_toggle").position = "absolute";
	document.getElementById("size_toggle").innerHTML = "Min";

	fullscreen = true;
	document.getElementById("size_toggle").onclick = minimize;
	init();
}
function minimize(){
	document.getElementById("map_wrapper").style.width = '100%';
	document.getElementById("map_wrapper").style.height = '600px';
	document.getElementById("map_wrapper").style.position = 'relative';
	document.getElementById("map_canvas").style.width = '100%';
	document.getElementById("map_canvas").style.height = '100%';
	document.getElementById("map_canvas").style.position = 'absolute';
	document.getElementById("map_canvas").style.left = '0';
	document.getElementById("map_canvas").style.top = '0';
	document.getElementById("data_query").style.left = '0';
	document.getElementById("data_query").style.top = '50%';
	document.getElementById("footer").style.visibility = "visible";
	document.getElementById("size_toggle").innerHTML = "Max";
	document.getElementById("size_toggle").style.right = "5px";
	fullscreen = false;
	document.getElementById("size_toggle").onclick = maximize;
	init();
}
function expandQuery(){
	document.getElementById("data_query").style.width = "100%";
	document.getElementById("data_query").style.left = "0px";
	document.getElementById("data_query").style.top = "100%";
	document.getElementById("data_query").style.height = "50%";
	document.getElementById("data_query").style.position = "absolute";
	document.getElementById("data_query").style.opacity = "0.8";

	if (fullscreen == true){
		document.getElementById("map_canvas").style.height = "50%";
	} else {
		document.getElementById("map_canvas").style.height = "300px";
	}
	document.getElementById("data_query").onclick = shrinkQuery;
}
function shrinkQuery(){
	document.getElementById("data_query").style.width = "200px";
	document.getElementById("data_query").style.left = "auto";
	document.getElementById("data_query").style.top = "50%";
	document.getElementById("data_query").style.height = "100px";
	document.getElementById("data_query").style.position = "absolute";
	document.getElementById("data_query").style.opacity = "0.8";
	document.getElementById("map_canvas").style.height = "600px";

	
	if (fullscreen == true){
		document.getElementById("map_canvas").style.height = "100%";
	} else {
		document.getElementById("map_canvas").style.height = "600px";
	}
	document.getElementById("data_query").onclick = expandQuery;
}
